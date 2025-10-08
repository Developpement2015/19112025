<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\DataTables;

class ActivityLogController extends Controller
{
    public function index()
    {
        return view('activity-logs.index');
    }

    public function data(Request $request)
    {
        $query = Activity::with(['causer', 'subject'])
            ->latest();

        // Apply filters
        if ($request->filled('log_name')) {
            $query->where('log_name', $request->log_name);
        }

        if ($request->filled('event')) {
            $query->where('event', $request->event);
        }

        if ($request->filled('causer_type')) {
            $query->where('causer_type', $request->causer_type);
        }

        if ($request->filled('subject_type')) {
            $query->where('subject_type', $request->subject_type);
        }

        if ($request->filled('causer_id')) {
            $query->where('causer_id', $request->causer_id);
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        return DataTables::of($query)
            ->addColumn('causer_name', function ($activity) {
                if ($activity->causer) {
                    return $activity->causer->name ?? $activity->causer->nom ?? 'N/A';
                }
                return 'Système';
            })
            ->addColumn('subject_name', function ($activity) {
                if ($activity->subject) {
                    if (isset($activity->subject->name)) {
                        return $activity->subject->name;
                    } elseif (isset($activity->subject->nom)) {
                        return $activity->subject->nom;
                    } elseif (isset($activity->subject->ppr)) {
                        return $activity->subject->ppr . ' - ' . ($activity->subject->nom ?? '');
                    }
                    return 'ID: ' . $activity->subject->id;
                }
                return 'N/A';
            })
            ->addColumn('description_formatted', function ($activity) {
                $description = $activity->description;

                // Translate common activity descriptions
                $translations = [
                    'created' => 'créé',
                    'updated' => 'mis à jour',
                    'deleted' => 'supprimé',
                    'restored' => 'restauré',
                ];

                foreach ($translations as $en => $fr) {
                    $description = str_replace($en, $fr, $description);
                }

                return $description;
            })
            ->addColumn('properties_formatted', function ($activity) {
                if (empty($activity->properties)) {
                    return '<span class="text-muted">Aucune donnée</span>';
                }

                $html = '<button class="btn btn-sm btn-outline-info" onclick="showProperties(' . $activity->id . ')">
                    <i class="fa fa-eye"></i> Voir détails
                </button>';

                return $html;
            })
            ->addColumn('log_name_badge', function ($activity) {
                $colors = [
                    'User' => 'bg-primary',
                    'Fonctionnaire' => 'bg-success',
                    'default' => 'bg-secondary'
                ];

                $color = $colors[$activity->log_name] ?? $colors['default'];
                return '<span class="badge ' . $color . '">' . $activity->log_name . '</span>';
            })
            ->addColumn('event_badge', function ($activity) {
                $colors = [
                    'created' => 'bg-success',
                    'updated' => 'bg-warning',
                    'deleted' => 'bg-danger',
                    'restored' => 'bg-info'
                ];

                $color = $colors[$activity->event] ?? 'bg-secondary';
                $text = ucfirst($activity->event);

                return '<span class="badge ' . $color . '">' . $text . '</span>';
            })
            ->addColumn('created_at_formatted', function ($activity) {
                return $activity->created_at->format('d/m/Y H:i:s');
            })
            ->rawColumns(['properties_formatted', 'log_name_badge', 'event_badge'])
            ->make(true);
    }

    public function show($id)
    {
        $activity = Activity::with(['causer', 'subject'])->findOrFail($id);

        return response()->json([
            'id' => $activity->id,
            'log_name' => $activity->log_name,
            'description' => $activity->description,
            'event' => $activity->event,
            'causer' => $activity->causer ? [
                'type' => $activity->causer_type,
                'id' => $activity->causer_id,
                'name' => $activity->causer->name ?? $activity->causer->nom ?? 'N/A'
            ] : null,
            'subject' => $activity->subject ? [
                'type' => $activity->subject_type,
                'id' => $activity->subject_id,
                'name' => $activity->subject->name ?? $activity->subject->nom ?? 'N/A'
            ] : null,
            'properties' => $activity->properties,
            'created_at' => $activity->created_at->format('d/m/Y H:i:s'),
            'updated_at' => $activity->updated_at->format('d/m/Y H:i:s'),
        ]);
    }

    public function getLogNames()
    {
        $logNames = Activity::distinct()->pluck('log_name')->filter();
        return response()->json($logNames);
    }

    public function getEvents()
    {
        $events = Activity::distinct()->pluck('event')->filter();
        return response()->json($events);
    }

    public function getCauserTypes()
    {
        $causerTypes = Activity::distinct()->pluck('causer_type')->filter();
        return response()->json($causerTypes);
    }

    public function getSubjectTypes()
    {
        $subjectTypes = Activity::distinct()->pluck('subject_type')->filter();
        return response()->json($subjectTypes);
    }

    public function getUsers()
    {
        $users = Activity::with('causer')
            ->whereNotNull('causer_id')
            ->whereNotNull('causer_type')
            ->get()
            ->pluck('causer')
            ->filter()
            ->unique('id')
            ->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name ?? $user->nom ?? 'Utilisateur #' . $user->id
                ];
            })
            ->values();

        return response()->json($users);
    }


}
