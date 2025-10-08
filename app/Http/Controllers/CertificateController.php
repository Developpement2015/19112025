<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    /**
     * Add a new certificate for a fonctionnaire.
     */
    public function add(Request $request)
    {
        // Validate the request data
        $request->validate([
            'fonctionnaire_id' => 'required|exists:fonctionnaires,id',
            'type_certificate_id' => 'nullable|exists:type_certificates,id',
            'date_depot' => 'nullable|date',
            'date_debut' => 'nullable|date',
            'jours' => 'nullable|integer|min:0',
            'observation' => 'nullable|string',
            'certificate_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {
            $certificate = new Certificate();
            $certificate->fonctionnaire_id = $request->input('fonctionnaire_id');
            $certificate->type_certificate_id = $request->input('type_certificate_id');
            $certificate->date_depot = $request->input('date_depot');
            $certificate->date_debut = $request->input('date_debut');
            $certificate->jours = $request->input('jours');
            $certificate->observation = $request->input('observation');

            // Handle file upload if provided
            if ($request->hasFile('certificate_file')) {
                $file = $request->file('certificate_file');
                $path = $file->store('certificates', 'public');
                $certificate->url = $path;
            }

            $certificate->save();

            DB::commit();
            return redirect()->back()->with('success', 'Le certificat a bien été ajouté pour le fonctionnaire');
        } catch (\Exception $e) {
            // Rollback the transaction in case of error
            DB::rollBack();
            // Handle the exception (e.g., log it, return an error response)
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $e->getMessage());
        }
    }

    /**
     * Delete a certificate.
     */
    public function delete($id)
    {
        try {
            $certificate = Certificate::findOrFail($id);

            // Delete the file if it exists
            if ($certificate->url) {
                Storage::disk('public')->delete($certificate->url);
            }

            $certificate->delete();

            return redirect()->back()->with('success', 'Le certificat a bien été supprimé');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la suppression du certificat: ' . $e->getMessage());
        }
    }

    /**
     * Generate and download a PDF for a fonctionnaire's certificate.
     */
    public function pdf($id)
    {
        $certificate = \App\Models\Certificate::with(['fonctionnaire', 'type_certificate'])->findOrFail($id);
        $fonctionnaire = $certificate->fonctionnaire;
        $typeCertificate = $certificate->type_certificate;

        // Create PDF
        $pdf = new \App\Utils\CustomPDF('P', 'mm', 'A4');

        // Set document information
        $pdf->SetCreator('GRHDMSP-Fes');
        $pdf->SetAuthor('Med Kaddouri');
        $pdf->SetTitle('Décision de Certificat');
        $pdf->SetSubject('Décision de Certificat');

        // Set header and footer images
        $pdf->headerImage = public_path('html/assets/img/pdf/header-delegation-urh.png');
        $pdf->footerImage = public_path('html/assets/img/pdf/footer-deligation.png');

        // Set margins
        $pdf->SetMargins(20, 50, 20); // Left, Top, Right
        $pdf->SetHeaderMargin(20);
        $pdf->SetFooterMargin(20);

        // Set Auto Page Break
        $pdf->SetAutoPageBreak(true, 30); // Bottom margin for auto page break

        // Add a page
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('dejavusans', '', 12);

        // Add content (modeled after congeDecision)
        $html = '<h1 style="text-align: center; font-size: 18px; margin-bottom: 20px;text-decoration: underline;">CERTIFICAT</h1>';
        $html .= '<p style="text-align: justify; line-height: 0.5;">Le Délégué du M.S. à la Préfecture de Fès :</p>';
        $html .= '<p style="text-align: justify; line-height: 0.5;">Vu la demande de certificat présentée par M. ' . $fonctionnaire->nom . ' ' . $fonctionnaire->prenom . '</p>';
        $html .= '<p style="text-align: justify; line-height: 0.5;">Vu l\'avis favorable de son chef immédiat</p>';
        $html .= '<p style="text-align: justify; line-height: 0.5;">Vu les pièces justificatives :</p>';

        $html .= '<h2 style="text-align: center; font-size: 14px; margin: 20px 0;text-decoration: underline;">CERTIFIE:</h2>';
        $html .= '<p style="text-align: justify; line-height: 1.2;"><strong>Article unique : </strong><b style="text-transform: uppercase;">' . ($typeCertificate ? $typeCertificate->nom : 'Certificat') . '</b></p>';
        $html .= '<p style="text-align: justify; line-height: 1.2;"><strong>Une durée de : </strong>' . ($certificate->jours ?? '-') . ' Jour(s)</p>';
        $html .= '<p style="text-align: justify; line-height: 1.2;"><strong>Date de début : </strong>' . ($certificate->date_debut ? \Carbon\Carbon::parse($certificate->date_debut)->format('d/m/Y') : '-') . '</p>';
        $html .= '<p style="text-align: justify; line-height: 1.2;"><strong>Accordé à : </strong>' . $fonctionnaire->nom . ' ' . $fonctionnaire->prenom . '</p>';
        $html .= '<p style="text-align: justify; line-height: 1.2;"><strong>PPR : </strong>' . $fonctionnaire->ppr . '</p>';
        $html .= '<p style="text-align: justify; line-height: 1.2;"><strong>Grade : </strong>' . ($fonctionnaire->specialiteGrade ? $fonctionnaire->specialiteGrade->nom : '') . '</p>';
        $html .= '<p style="text-align: justify; line-height: 1.2;"><strong>Est en fonction : </strong>' . ($fonctionnaire->specialiteGrade ? $fonctionnaire->specialiteGrade->nom : '') . ' (' . ($fonctionnaire->nomFormationSanitaire ? $fonctionnaire->nomFormationSanitaire->nom : 'Fès') . ')</p>';
        $html .= '<p style="text-align: justify; line-height: 1.2;"><strong>Observation : </strong>' . ($certificate->observation ?? '-') . '</p>';

        $html .= '<p style="text-align: right; margin-top: 30px;">Fès, le ' . date('d/m/Y') . '</p>';
        $html .= '<p style="text-align: right; font-weight: bold;">LE DELEGUE DU MINISTERE DE LA SANTE<br>A LA PREFECTURE DE FES</p>';

        // Write HTML to PDF
        $pdf->writeHTML($html, true, false, true, false, '');

        // Output PDF to the browser
        return response()->streamDownload(
            fn() => $pdf->Output('certificat_' . $fonctionnaire->ppr . '.pdf', 'I'),
            'certificat_' . $fonctionnaire->ppr . '.pdf'
        );
    }
}
