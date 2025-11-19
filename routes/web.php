<?php
use App\Http\Controllers\TypeCategorieFormationsController;
use App\Http\Controllers\ArrondissementCommuneController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CadreController;
use App\Http\Controllers\CategorieCadreController;
use App\Http\Controllers\CategorieFormationController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FonctionController;
use App\Http\Controllers\FonctionnaireController;
use App\Http\Controllers\GradeCadreController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\HistoriqueMutationController;
use App\Http\Controllers\HistoriquePopulationController;
use App\Http\Controllers\HistoriquePositionController;
use App\Http\Controllers\NiveauCategorieFormationController;
use App\Http\Controllers\NomFormationSanitaireController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RelicatController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SpecialiteGradeController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\TypeCategorieFormationController;
use App\Http\Controllers\TypeCertificateController;
use App\Http\Controllers\TypeCongeController;
use App\Http\Controllers\TypeMutationController;
use App\Http\Controllers\TypesCongeController;
use App\Http\Controllers\TypeStageController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\GreveController;
use App\Http\Controllers\DocumentSearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\RetraiteController;
use App\Http\Controllers\BatchPrintController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\EcoleController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\EncadrantController;
use App\Http\Controllers\IntituleFormationController;
use App\Models\ArrondissementCommune;
use App\Models\SpecialiteGrade;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/statistics/detailed');
})->name('home')->middleware('auth');


Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest');


//auth routes
Route::post('/login/post', [AuthController::class, 'login'])->name('login.post')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

//user routes
Route::put('/user/update', [AuthController::class, 'update'])->name('user.update')->middleware('auth');



//arrondissements-et-communes
Route::get('/arrondissements-et-communes', [ArrondissementCommuneController::class, 'page'])->name('arrondissements.page')->middleware(['auth', 'permission:parametrage.arrondissements-communes']);
Route::get('/arrondissements-et-communes/data', [ArrondissementCommuneController::class, 'data'])->name('arrondissements.data')->middleware(['auth', 'permission:parametrage.arrondissements-communes']);
Route::post('/arrondissements-et-communes/add', [ArrondissementCommuneController::class, 'add'])->name('arrondissements.add')->middleware(['auth', 'permission:parametrage.arrondissements-communes']);
Route::put('/arrondissements-et-communes/update/{id}', [ArrondissementCommuneController::class, 'update'])->name('arrondissements.update')->middleware(['auth', 'permission:parametrage.arrondissements-communes']);
Route::delete('/arrondissements-et-communes/delete/{id}', [ArrondissementCommuneController::class, 'delete'])->name('arrondissements.delete')->middleware(['auth', 'permission:parametrage.arrondissements-communes']);
Route::get('/arrondissements-et-communes/export', [ArrondissementCommuneController::class, 'export'])->name('arrondissements.export')->middleware(['auth', 'permission:parametrage.arrondissements-communes']);
Route::get('/arrondissements-et-communes/pdf', [ArrondissementCommuneController::class, 'pdf'])->name('arrondissements.pdf')->middleware(['auth', 'permission:parametrage.arrondissements-communes']);



//Région
Route::get('/regions', [RegionController::class, 'page'])->name('regions.page')->middleware(['auth', 'permission:parametrage.regions']);
Route::get('/regions/data', [RegionController::class, 'data'])->name('regions.data')->middleware(['auth', 'permission:parametrage.regions']);
Route::post('/regions/add', [RegionController::class, 'add'])->name('regions.add')->middleware(['auth', 'permission:parametrage.regions']);
Route::put('/regions/update/{id}', [RegionController::class, 'update'])->name('regions.update')->middleware(['auth', 'permission:parametrage.regions']);
Route::delete('/regions/delete/{id}', [RegionController::class, 'delete'])->name('regions.delete')->middleware(['auth', 'permission:parametrage.regions']);
Route::get('/regions/export', [RegionController::class, 'export'])->name('regions.export')->middleware(['auth', 'permission:parametrage.regions']);
Route::get('/regions/pdf', [RegionController::class, 'pdf'])->name('regions.pdf')->middleware(['auth', 'permission:parametrage.regions']);


//villes :
Route::get('/villes', [VilleController::class, 'page'])->name('villes.page')->middleware(['auth', 'permission:parametrage.villes']);
Route::get('/villes/data', [VilleController::class, 'data'])->name('villes.data')->middleware(['auth', 'permission:parametrage.villes']);
Route::post('/villes/add', [VilleController::class, 'add'])->name('villes.add')->middleware(['auth', 'permission:parametrage.villes']);
Route::put('/villes/update/{id}', [VilleController::class, 'update'])->name('villes.update')->middleware(['auth', 'permission:parametrage.villes']);
Route::delete('/villes/delete/{id}', [VilleController::class, 'delete'])->name('villes.delete')->middleware(['auth', 'permission:parametrage.villes']);
Route::get('/villes/export', [VilleController::class, 'export'])->name('villes.export')->middleware(['auth', 'permission:parametrage.villes']);
Route::get('/villes/pdf', [VilleController::class, 'pdf'])->name('villes.pdf')->middleware(['auth', 'permission:parametrage.villes']);

//Grades :
Route::get('/grades', [GradeController::class, 'page'])->name('grades.page')->middleware(['auth', 'permission:parametrage.grades']);
Route::get('/grades/data', [GradeController::class, 'data'])->name('grades.data')->middleware(['auth', 'permission:parametrage.grades']);
Route::post('/grades/add', [GradeController::class, 'add'])->name('grades.add')->middleware(['auth', 'permission:parametrage.grades']);
Route::put('/grades/update/{id}', [GradeController::class, 'update'])->name('grades.update')->middleware(['auth', 'permission:parametrage.grades']);
Route::delete('/grades/delete/{id}', [GradeController::class, 'delete'])->name('grades.delete')->middleware(['auth', 'permission:parametrage.grades']);
Route::get('/grades/export', [GradeController::class, 'export'])->name('grades.export')->middleware('auth');
Route::get('/grades/pdf', [GradeController::class, 'pdf'])->name('grades.pdf')->middleware('auth');
//Positions
Route::get('/positions', [PositionController::class, 'page'])->name('positions.page')->middleware(['auth', 'permission:parametrage.positions']);
Route::get('/positions/data', [PositionController::class, 'data'])->name('positions.data')->middleware(['auth', 'permission:parametrage.positions']);
Route::post('/positions/add', [PositionController::class, 'add'])->name('positions.add')->middleware(['auth', 'permission:parametrage.positions']);
Route::put('/positions/update/{id}', [PositionController::class, 'update'])->name('positions.update')->middleware(['auth', 'permission:parametrage.positions']);
Route::delete('/positions/delete/{id}', [PositionController::class, 'delete'])->name('positions.delete')->middleware(['auth', 'permission:parametrage.positions']);
Route::get('/positions/export', [PositionController::class, 'export'])->name('positions.export')->middleware(['auth', 'permission:parametrage.positions']);
Route::get('/positions/pdf', [PositionController::class, 'pdf'])->name('positions.pdf')->middleware(['auth', 'permission:parametrage.positions']);
//Services
Route::get('/services', [ServiceController::class, 'page'])->name('services.page')->middleware(['auth', 'permission:parametrage.services']);
Route::get('/services/data', [ServiceController::class, 'data'])->name('services.data')->middleware(['auth', 'permission:parametrage.services']);
Route::post('/services/add', [ServiceController::class, 'add'])->name('services.add')->middleware(['auth', 'permission:parametrage.services']);
Route::put('/services/update/{id}', [ServiceController::class, 'update'])->name('services.update')->middleware(['auth', 'permission:parametrage.services']);
Route::delete('/services/delete/{id}', [ServiceController::class, 'delete'])->name('services.delete')->middleware(['auth', 'permission:parametrage.services']);
Route::get('/services/export', [ServiceController::class, 'export'])->name('services.export')->middleware(['auth', 'permission:parametrage.services']);
Route::get('/services/pdf', [ServiceController::class, 'pdf'])->name('services.pdf')->middleware(['auth', 'permission:parametrage.services']);
//fonctions
Route::get('/fonctions', [FonctionController::class, 'page'])->name('fonctions.page')->middleware(['auth', 'permission:parametrage.fonctions']);
Route::get('/fonctions/data', [FonctionController::class, 'data'])->name('fonctions.data')->middleware(['auth', 'permission:parametrage.fonctions']);
Route::post('/fonctions/add', [FonctionController::class, 'add'])->name('fonctions.add')->middleware(['auth', 'permission:parametrage.fonctions']);
Route::put('/fonctions/update/{id}', [FonctionController::class, 'update'])->name('fonctions.update')->middleware(['auth', 'permission:parametrage.fonctions']);
Route::delete('/fonctions/delete/{id}', [FonctionController::class, 'delete'])->name('fonctions.delete')->middleware(['auth', 'permission:parametrage.fonctions']);
Route::get('/fonctions/export', [FonctionController::class, 'export'])->name('fonctions.export')->middleware(['auth', 'permission:parametrage.fonctions']);
Route::get('/fonctions/pdf', [FonctionController::class, 'pdf'])->name('fonctions.pdf')->middleware(['auth', 'permission:parametrage.fonctions']);
//typesconges
Route::get('/conges/types', [TypesCongeController::class, 'page'])->name('conges.types.page')->middleware(['auth', 'permission:parametrage.conges-types']);
Route::get('/conges/types/data', [TypesCongeController::class, 'data'])->name('conges.types.data')->middleware(['auth', 'permission:parametrage.conges-types']);
Route::post('conges/types/add', [TypesCongeController::class, 'add'])->name('conges.types.add')->middleware(['auth', 'permission:parametrage.conges-types']);
Route::put('conges/types/update/{id}', [TypesCongeController::class, 'update'])->name('conges.types.update')->middleware(['auth', 'permission:parametrage.conges-types']);
Route::delete('conges/types/delete/{id}', [TypesCongeController::class, 'delete'])->name('conges.types.delete')->middleware(['auth', 'permission:parametrage.conges-types']);
Route::get('conges/types/export', [TypesCongeController::class, 'export'])->name('conges.types.export')->middleware(['auth', 'permission:parametrage.conges-types']);
Route::get('conges/types/pdf', [TypesCongeController::class, 'pdf'])->name('conges.types.pdf')->middleware(['auth', 'permission:parametrage.conges-types']);
//typescertificats
Route::get('/certificats/types', [TypeCertificateController::class, 'page'])->name('certificats.types.page')->middleware(['auth', 'permission:parametrage.certificats-types']);
Route::get('/certificats/types/data', [TypeCertificateController::class, 'data'])->name('certificats.types.data')->middleware(['auth', 'permission:parametrage.certificats-types']);
Route::post('certificats/types/add', [TypeCertificateController::class, 'add'])->name('certificats.types.add')->middleware(['auth', 'permission:parametrage.certificats-types']);
Route::put('certificats/types/update/{id}', [TypeCertificateController::class, 'update'])->name('certificats.types.update')->middleware(['auth', 'permission:parametrage.certificats-types']);
Route::delete('certificats/types/delete/{id}', [TypeCertificateController::class, 'delete'])->name('certificats.types.delete')->middleware(['auth', 'permission:parametrage.certificats-types']);
Route::get('certificats/types/export', [TypeCertificateController::class, 'export'])->name('certificats.types.export')->middleware(['auth', 'permission:parametrage.certificats-types']);
Route::get('certificats/types/pdf', [TypeCertificateController::class, 'pdf'])->name('certificats.types.pdf')->middleware(['auth', 'permission:parametrage.certificats-types']);
//TypeStage
Route::get('/stages/types', [TypeStageController::class, 'page'])->name('stages.types.page')->middleware(['auth', 'permission:parametrage.stages-types']);
Route::get('/stages/types/data', [TypeStageController::class, 'data'])->name('stages.types.data')->middleware(['auth', 'permission:parametrage.stages-types']);
Route::post('stages/types/add', [TypeStageController::class, 'add'])->name('stages.types.add')->middleware(['auth', 'permission:parametrage.stages-types']);
Route::put('stages/types/update/{id}', [TypeStageController::class, 'update'])->name('stages.types.update')->middleware(['auth', 'permission:parametrage.stages-types']);
Route::delete('stages/types/delete/{id}', [TypeStageController::class, 'delete'])->name('stages.types.delete')->middleware(['auth', 'permission:parametrage.stages-types']);
Route::get('stages/types/export', [TypeStageController::class, 'export'])->name('stages.types.export')->middleware(['auth', 'permission:parametrage.stages-types']);
Route::get('stages/types/pdf', [TypeStageController::class, 'pdf'])->name('stages.types.pdf')->middleware(['auth', 'permission:parametrage.stages-types']);



//categoriecadre
Route::get('/categories-cadres', [CategorieCadreController::class, 'page'])->name('categories-cadres.page')->middleware(['auth', 'permission:cadres.categories-cadres']);
Route::get('/categories-cadres/data', [CategorieCadreController::class, 'data'])->name('categories-cadres.data')->middleware(['auth', 'permission:cadres.categories-cadres']);
Route::post('categories-cadres/add', [CategorieCadreController::class, 'add'])->name('categories-cadres.add')->middleware(['auth', 'permission:cadres.categories-cadres']);
Route::put('categories-cadres/update/{id}', [CategorieCadreController::class, 'update'])->name('categories-cadres.update')->middleware(['auth', 'permission:cadres.categories-cadres']);
Route::delete('categories-cadres/delete/{id}', [CategorieCadreController::class, 'delete'])->name('categories-cadres.delete')->middleware(['auth', 'permission:cadres.categories-cadres']);
Route::get('categories-cadres/export', [CategorieCadreController::class, 'export'])->name('categories-cadres.export')->middleware(['auth', 'permission:cadres.categories-cadres']);
Route::get('categories-cadres/pdf', [CategorieCadreController::class, 'pdf'])->name('categories-cadres.pdf')->middleware(['auth', 'permission:cadres.categories-cadres']);


//cadre
Route::get('/cadres', [CadreController::class, 'page'])->name('cadres.page')->middleware(['auth', 'permission:cadres.view']);
Route::get('/cadres/data', [CadreController::class, 'data'])->name('cadres.data')->middleware(['auth', 'permission:cadres.view']);
Route::post('cadres/add', [CadreController::class, 'add'])->name('cadres.add')->middleware(['auth', 'permission:cadres.create']);
Route::put('cadres/update/{id}', [CadreController::class, 'update'])->name('cadres.update')->middleware(['auth', 'permission:cadres.edit']);
Route::delete('cadres/delete/{id}', [CadreController::class, 'delete'])->name('cadres.delete')->middleware(['auth', 'permission:cadres.delete']);
Route::get('cadres/export', [CadreController::class, 'export'])->name('cadres.export')->middleware(['auth', 'permission:cadres.export']);
Route::get('cadres/pdf', [CadreController::class, 'pdf'])->name('cadres.pdf')->middleware(['auth', 'permission:cadres.export']);



//grades cadres
Route::get('/grades-cadres', [GradeCadreController::class, 'page'])->name('grades-cadres.page')->middleware(['auth', 'permission:cadres.grades-cadres']);
Route::get('/grades-cadres/data', [GradeCadreController::class, 'data'])->name('grades-cadres.data')->middleware(['auth', 'permission:cadres.grades-cadres']);
Route::post('grades-cadres/add', [GradeCadreController::class, 'add'])->name('grades-cadres.add')->middleware(['auth', 'permission:cadres.grades-cadres']);
Route::put('grades-cadres/update/{id}', [GradeCadreController::class, 'update'])->name('grades-cadres.update')->middleware(['auth', 'permission:cadres.grades-cadres']);
Route::delete('grades-cadres/delete/{id}', [GradeCadreController::class, 'delete'])->name('grades-cadres.delete')->middleware(['auth', 'permission:cadres.grades-cadres']);
Route::get('grades-cadres/export', [GradeCadreController::class, 'export'])->name('grades-cadres.export')->middleware('auth');
Route::get('grades-cadres/pdf', [GradeCadreController::class, 'pdf'])->name('grades-cadres.pdf')->middleware('auth');



//specialite grade
Route::get('/specialites-cadres', [SpecialiteGradeController::class, 'page'])->name('specialite-grade.page')->middleware('auth');
Route::get('/specialites-cadres/data', [SpecialiteGradeController::class, 'data'])->name('specialite-grade.data')->middleware('auth');
Route::post('specialites-cadres/add', [SpecialiteGradeController::class, 'add'])->name('specialite-grade.add')->middleware('auth');
Route::put('specialites-cadres/update/{id}', [SpecialiteGradeController::class, 'update'])->name('specialite-grade.update')->middleware('auth');
Route::delete('specialites-cadres/delete/{id}', [SpecialiteGradeController::class, 'delete'])->name('specialite-grade.delete')->middleware('auth');
Route::get('specialites-cadres/export', [SpecialiteGradeController::class, 'export'])->name('specialite-grade.export')->middleware('auth');
Route::get('specialites-cadres/pdf', [SpecialiteGradeController::class, 'pdf'])->name('specialite-grade.pdf')->middleware('auth');



//categorie formation
Route::get('/categories-formation', [CategorieFormationController::class, 'page'])->name('categories-formation.page')->middleware(['auth', 'permission:formations.categories-formation']);
Route::get('/categories-formation/data', [CategorieFormationController::class, 'data'])->name('categories-formation.data')->middleware(['auth', 'permission:formations.categories-formation']);
Route::post('categories-formation/add', [CategorieFormationController::class, 'add'])->name('categories-formation.add')->middleware(['auth', 'permission:formations.categories-formation']);
Route::put('categories-formation/update/{id}', [CategorieFormationController::class, 'update'])->name('categories-formation.update')->middleware(['auth', 'permission:formations.categories-formation']);
Route::delete('categories-formation/delete/{id}', [CategorieFormationController::class, 'delete'])->name('categories-formation.delete')->middleware(['auth', 'permission:formations.categories-formation']);
Route::get('categories-formation/export', [CategorieFormationController::class, 'export'])->name('categories-formation.export')->middleware(['auth', 'permission:formations.categories-formation']);
Route::get('categories-formation/pdf', [CategorieFormationController::class, 'pdf'])->name('categories-formation.pdf')->middleware(['auth', 'permission:formations.categories-formation']);

//type etablissement
Route::get('/type-categories-formation', [TypeCategorieFormationController::class, 'page'])->name('type-categories-formation.page')->middleware(['auth', 'permission:parametrage.type-categorie-formation']);
Route::get('/type-categories-formation/data', [TypeCategorieFormationController::class, 'data'])->name('type-categories-formation.data')->middleware(['auth', 'permission:parametrage.type-categorie-formation']);
Route::post('type-categories-formation/add', [TypeCategorieFormationController::class, 'add'])->name('type-categories-formation.add')->middleware(['auth', 'permission:parametrage.type-categorie-formation']);
Route::put('type-categories-formation/update/{id}', [TypeCategorieFormationController::class, 'update'])->name('type-categories-formation.update')->middleware(['auth', 'permission:parametrage.type-categorie-formation']);
Route::delete('type-categories-formation/delete/{id}', [TypeCategorieFormationController::class, 'delete'])->name('type-categories-formation.delete')->middleware(['auth', 'permission:parametrage.type-categorie-formation']);
Route::get('type-categories-formation/export', [TypeCategorieFormationController::class, 'export'])->name('type-categories-formation.export')->middleware(['auth', 'permission:parametrage.type-categorie-formation']);
Route::get('type-categories-formation/pdf', [TypeCategorieFormationController::class, 'pdf'])->name('type-categories-formation.pdf')->middleware(['auth', 'permission:parametrage.type-categorie-formation']);

//niveau categories formation

Route::get('/niveau-categories-formation', [NiveauCategorieFormationController::class, 'page'])->name('niveau-categories-formation.page')->middleware(['auth', 'permission:parametrage.niveau-categorie-formation']);
Route::get('/niveau-categories-formation/data', [NiveauCategorieFormationController::class, 'data'])->name('niveau-categories-formation.data')->middleware(['auth', 'permission:parametrage.niveau-categorie-formation']);
Route::post('niveau-categories-formation/add', [NiveauCategorieFormationController::class, 'add'])->name('niveau-categories-formation.add')->middleware(['auth', 'permission:parametrage.niveau-categorie-formation']);
Route::put('niveau-categories-formation/update/{id}', [NiveauCategorieFormationController::class, 'update'])->name('niveau-categories-formation.update')->middleware(['auth', 'permission:parametrage.niveau-categorie-formation']);
Route::delete('niveau-categories-formation/delete/{id}', [NiveauCategorieFormationController::class, 'delete'])->name('niveau-categories-formation.delete')->middleware(['auth', 'permission:parametrage.niveau-categorie-formation']);
Route::get('niveau-categories-formation/export', [NiveauCategorieFormationController::class, 'export'])->name('niveau-categories-formation.export')->middleware(['auth', 'permission:parametrage.niveau-categorie-formation']);
Route::get('niveau-categories-formation/pdf', [NiveauCategorieFormationController::class, 'pdf'])->name('niveau-categories-formation.pdf')->middleware(['auth', 'permission:parametrage.niveau-categorie-formation']);



//nom categories formation
Route::get('/nom-formation-sanitaire', [NomFormationSanitaireController::class, 'page'])->name('nom-formation-sanitaire.page')->middleware(['auth', 'permission:formations.nom-formation-sanitaire']);
Route::get('/nom-formation-sanitaire/data', [NomFormationSanitaireController::class, 'data'])->name('nom-formation-sanitaire.data')->middleware(['auth', 'permission:formations.nom-formation-sanitaire']);
Route::post('nom-formation-sanitaire/add', [NomFormationSanitaireController::class, 'add'])->name('nom-formation-sanitaire.add')->middleware(['auth', 'permission:formations.nom-formation-sanitaire']);
Route::put('nom-formation-sanitaire/update/{id}', [NomFormationSanitaireController::class, 'update'])->name('nom-formation-sanitaire.update')->middleware(['auth', 'permission:formations.nom-formation-sanitaire']);
Route::delete('nom-formation-sanitaire/delete/{id}', [NomFormationSanitaireController::class, 'delete'])->name('nom-formation-sanitaire.delete')->middleware(['auth', 'permission:formations.nom-formation-sanitaire']);
Route::get('nom-formation-sanitaire/export', [NomFormationSanitaireController::class, 'export'])->name('nom-formation-sanitaire.export')->middleware(['auth', 'permission:formations.nom-formation-sanitaire']);
Route::get('nom-formation-sanitaire/pdf', [NomFormationSanitaireController::class, 'pdf'])->name('nom-formation-sanitaire.pdf')->middleware(['auth', 'permission:formations.nom-formation-sanitaire']);


//population
Route::post('population/add', [HistoriquePopulationController::class, 'add'])->name('population.add')->middleware('auth');
Route::put('population/update/{id}', [HistoriquePopulationController::class, 'update'])->name('population.update')->middleware('auth');
Route::delete('population/delete/{id}', [HistoriquePopulationController::class, 'delete'])->name('population.delete')->middleware('auth');



//type mutation
Route::get('/type-de-mutation', [TypeMutationController::class, 'page'])->name('type-de-mutation.page')->middleware('auth');
Route::get('/type-de-mutation/data', [TypeMutationController::class, 'data'])->name('type-de-mutation.data')->middleware('auth');
Route::post('type-de-mutation/add', [TypeMutationController::class, 'add'])->name('type-de-mutation.add')->middleware('auth');
Route::put('type-de-mutation/update/{id}', [TypeMutationController::class, 'update'])->name('type-de-mutation.update')->middleware('auth');
Route::delete('type-de-mutation/delete/{id}', [TypeMutationController::class, 'delete'])->name('type-de-mutation.delete')->middleware('auth');
Route::get('type-de-mutation/export', [TypeMutationController::class, 'export'])->name('type-de-mutation.export')->middleware('auth');
Route::get('type-de-mutation/pdf', [TypeMutationController::class, 'pdf'])->name('type-de-mutation.pdf')->middleware('auth');



//fonctionnaire
Route::get('/fonctionnaires', [FonctionnaireController::class, 'page'])->name('fonctionnaire.page')->middleware(['auth', 'permission:fonctionnaires.view']);
Route::get('/fonctionnaire', [FonctionnaireController::class, 'page'])->name('fonctionnaire.index')->middleware(['auth', 'permission:fonctionnaires.view']);
Route::get('/fonctionnaire/data', [FonctionnaireController::class, 'data'])->name('fonctionnaire.data')->middleware(['auth', 'permission:fonctionnaires.view']);
// Route::get('/fonctionnaire/{id}', [FonctionnaireController::class, 'show'])->name('fonctionnaire.show')->middleware('auth');
Route::post('fonctionnaire/add', [FonctionnaireController::class, 'add'])->name('fonctionnaire.add')->middleware(['auth', 'permission:fonctionnaires.create']);
Route::put('fonctionnaire/update/{id}', [FonctionnaireController::class, 'update'])->name('fonctionnaire.update')->middleware(['auth', 'permission:fonctionnaires.edit']);
Route::delete('fonctionnaire/delete/{id}', [FonctionnaireController::class, 'delete'])->name('fonctionnaire.delete')->middleware(['auth', 'permission:fonctionnaires.delete']);
Route::get('fonctionnaire/export', [FonctionnaireController::class, 'export'])->name('fonctionnaire.export')->middleware(['auth', 'permission:fonctionnaires.view']);
Route::get('fonctionnaire/pdf', [FonctionnaireController::class, 'pdf'])->name('fonctionnaire.pdf')->middleware(['auth', 'permission:fonctionnaires.view']);
Route::post('fonctionnaire/export-filtered', [FonctionnaireController::class, 'exportFiltered'])->name('fonctionnaire.export-filtered')->middleware(['auth', 'permission:fonctionnaires.view']);
Route::get('fonctionnaire/{id}/', [FonctionnaireController::class, 'show'])->name('fonctionnaire.show')->middleware(['auth', 'permission:fonctionnaires.view']);
Route::get('fonctionnaire/attestation-travail/{id}/', [FonctionnaireController::class, 'attestation'])->name('fonctionnaire.attestation')->middleware(['auth', 'permission:fonctionnaires.view']);
Route::post('fonctionnaire/export-assignments', [FonctionnaireController::class, 'exportAssignments'])->name('fonctionnaire.export-assignments')->middleware('auth');
Route::post('fonctionnaire/export-assignments-word', [FonctionnaireController::class, 'exportAssignmentsWord'])->name('fonctionnaire.export-assignments-word')->middleware('auth');
Route::post('fonctionnaire/export-conges', [FonctionnaireController::class, 'exportConges'])->name('fonctionnaire.export-conges')->middleware('auth');
Route::post('fonctionnaire/conge-decision/{relicatId}', [FonctionnaireController::class, 'congeDecision'])->name('fonctionnaire.conge-decision')->middleware('auth');
Route::get('fonctionnaire/conge-decision-details/{id}', [FonctionnaireController::class, 'showCongeDecision'])->name('fonctionnaire.conge-decision-details')->middleware('auth');

// Routes pour l'import Excel des fonctionnaires
Route::get('fonctionnaire/import', [FonctionnaireController::class, 'showImport'])->name('fonctionnaire.import')->middleware('auth');
Route::post('fonctionnaire/import', [FonctionnaireController::class, 'processImport'])->name('fonctionnaire.import.process')->middleware('auth');
Route::get('fonctionnaire/test-import', [FonctionnaireController::class, 'testImport'])->name('fonctionnaire.test-import')->middleware('auth');
Route::get('fonctionnaire/test-filters', [FonctionnaireController::class, 'testFilters'])->name('fonctionnaire.test-filters')->middleware('auth');
Route::get('fonctionnaire/test-specific-filter', [FonctionnaireController::class, 'testSpecificFilter'])->name('fonctionnaire.test-specific-filter')->middleware('auth');
Route::get('fonctionnaire/debug-categorie-relations', [FonctionnaireController::class, 'debugCategorieRelations'])->name('fonctionnaire.debug-categorie-relations')->middleware('auth');
Route::get('fonctionnaire/test-new-filter-logic', [FonctionnaireController::class, 'testNewFilterLogic'])->name('fonctionnaire.test-new-filter-logic')->middleware('auth');

// Test route without auth for debugging
Route::get('/test-filter-simple', function() {
    $categorieId = request()->get('categorie_id', 1);

    // Test the filter logic
    $cadres = \App\Models\Cadre::where('categorie_cadre_id', $categorieId)->get();
    $totalFonctionnaires = \App\Models\Fonctionnaire::count();

    // Test with category 1 (usually "ADMINISTRATIF")
    $cadresIds = \App\Models\Cadre::where('categorie_cadre_id', 1)->pluck('id');
    $gradeCadres = \App\Models\GradeCadre::whereIn('cadre_id', $cadresIds)->pluck('id');
    $specialiteGrades = \App\Models\SpecialiteGrade::whereIn('grade_id', $gradeCadres)->pluck('id');
    $fonctionnairesFiltered = \App\Models\Fonctionnaire::whereIn('specialite_grade_id', $specialiteGrades)->count();

    return response()->json([
        'total_fonctionnaires' => $totalFonctionnaires,
        'categorie_id_tested' => 1,
        'cadres_found' => $cadresIds->count(),
        'grade_cadres_found' => $gradeCadres->count(),
        'specialite_grades_found' => $specialiteGrades->count(),
        'fonctionnaires_filtered' => $fonctionnairesFiltered,
        'filter_working' => $fonctionnairesFiltered < $totalFonctionnaires ? 'YES' : 'NO',
        'categories_available' => \App\Models\CategorieCadre::select('id', 'nom')->get()
    ]);
});

// Debug the actual filter request
Route::get('/debug-filter-request', function() {
    // Simulate the exact same request as the AJAX call
    $request = new \Illuminate\Http\Request();
    $request->merge(['categorie_cadre' => '1']); // Test with category 1

    $controller = new \App\Http\Controllers\FonctionnaireController();
    $response = $controller->data($request);

    return response()->json([
        'message' => 'Testing exact filter logic',
        'request_params' => $request->all(),
        'response_data' => $response->getData()
    ]);
});

// Simple test for categorie cadre filter
Route::get('/test-categorie-filter/{id}', function($id) {
    // Test the exact logic from the controller
    $cadres = \App\Models\Cadre::where('categorie_cadre_id', $id)->pluck('id');
    $gradeCadres = \App\Models\GradeCadre::whereIn('cadre_id', $cadres)->pluck('id');
    $specialiteGrades = \App\Models\SpecialiteGrade::whereIn('grade_id', $gradeCadres)->pluck('id');

    $totalFonctionnaires = \App\Models\Fonctionnaire::count();
    $filteredFonctionnaires = \App\Models\Fonctionnaire::whereIn('specialite_grade_id', $specialiteGrades)->count();

    // Get some sample data
    $sampleFonctionnaires = \App\Models\Fonctionnaire::whereIn('specialite_grade_id', $specialiteGrades)
        ->with(['specialiteGrade.grade.cadre.categorie_cadre'])
        ->take(5)
        ->get();

    return response()->json([
        'categorie_id' => $id,
        'total_fonctionnaires' => $totalFonctionnaires,
        'cadres_found' => $cadres->count(),
        'cadres_ids' => $cadres,
        'grade_cadres_found' => $gradeCadres->count(),
        'specialite_grades_found' => $specialiteGrades->count(),
        'filtered_fonctionnaires' => $filteredFonctionnaires,
        'filter_working' => $filteredFonctionnaires < $totalFonctionnaires && $filteredFonctionnaires > 0,
        'sample_data' => $sampleFonctionnaires->map(function($f) {
            return [
                'ppr' => $f->ppr,
                'nom' => $f->nom,
                'prenom' => $f->prenom,
                'categorie' => $f->specialiteGrade->grade->cadre->categorie_cadre->nom ?? 'N/A'
            ];
        })
    ]);
});
Route::get('fonctionnaire/debug-data', [FonctionnaireController::class, 'debugData'])->name('fonctionnaire.debug-data')->middleware('auth');

// Simple test route to verify filters work
Route::get('/test-simple-filter', function() {
    $request = request();

    // Test with hardcoded values
    $query = \App\Models\Fonctionnaire::query();

    // Test service filter
    if ($request->get('service')) {
        $query->where('service_id', $request->get('service'));
    }

    // Test categorie cadre filter
    if ($request->get('categorie_cadre')) {
        $query->whereHas('specialiteGrade.grade.cadre', function($q) use ($request) {
            $q->where('categorie_cadre_id', $request->get('categorie_cadre'));
        });
    }

    $total = \App\Models\Fonctionnaire::count();
    $filtered = $query->count();

    return response()->json([
        'total_fonctionnaires' => $total,
        'filtered_count' => $filtered,
        'filter_working' => $filtered < $total,
        'request_params' => $request->all(),
        'sample_filtered' => $query->take(3)->get(['id', 'nom', 'prenom', 'ppr'])
    ]);
});

// Test page without auth
Route::get('/test-fonctionnaires-page', function() {
    $controller = new \App\Http\Controllers\FonctionnaireController();
    return $controller->page();
});

// Demandes routes (public create, restricted admin index)
use App\Http\Controllers\DemandeController;
Route::get('/demandes/create', [DemandeController::class, 'create'])->name('demandes.create');
Route::post('/demandes/store', [DemandeController::class, 'store'])->name('demandes.store');
Route::get('/demandes/mine', [DemandeController::class, 'mine'])->name('demandes.mine');
Route::post('/demandes/mine', [DemandeController::class, 'mine'])->name('demandes.mine.check');

// Password reset routes for fonctionnaires
Route::get('/demandes/forgot-password', [DemandeController::class, 'showForgotPassword'])->name('demandes.forgot-password');
Route::post('/demandes/send-reset-link', [DemandeController::class, 'sendResetLink'])->name('demandes.send-reset-link');
Route::get('/demandes/reset-password', [DemandeController::class, 'showResetPassword'])->name('demandes.show-reset-password');
Route::post('/demandes/reset-password', [DemandeController::class, 'resetPassword'])->name('demandes.reset-password');

Route::get('/demandes', [DemandeController::class, 'index'])->name('demandes.index')->middleware('auth');
Route::get('/demandes/{demande}', [DemandeController::class, 'show'])->name('demandes.show')->middleware('auth');
Route::get('/demandes/{demande}/edit', [DemandeController::class, 'edit'])->name('demandes.edit')->middleware(['auth', 'permission:demandes.manage']);
Route::put('/demandes/{demande}', [DemandeController::class, 'update'])->name('demandes.update')->middleware(['auth', 'permission:demandes.manage']);
Route::delete('/demandes/{demande}', [DemandeController::class, 'destroy'])->name('demandes.destroy')->middleware(['auth', 'permission:demandes.manage']);
Route::post('/demandes/{demande}/approve', [DemandeController::class, 'approve'])->name('demandes.approve')->middleware('auth');
Route::get('/demandes/{demande}/decide', [DemandeController::class, 'decide'])->name('demandes.decide')->middleware('auth');
Route::post('/demandes/{demande}/store-decision', [DemandeController::class, 'storeDecision'])->name('demandes.store-decision')->middleware('auth');

// Test data endpoint without auth (can be removed after testing)
Route::get('/test-fonctionnaires-data', function() {
    $controller = new \App\Http\Controllers\FonctionnaireController();
    return $controller->data(request());
});

// Test optimized filter methods (can be removed after testing)
Route::get('/test-optimized-filters', function() {
    $controller = new \App\Http\Controllers\FonctionnaireController();
    return $controller->dataCheckbox(request());
});

// Test filter functionality - Simple test
Route::get('/test-filter-debug', function() {
    // Test basic counts
    $totalFonctionnaires = \App\Models\Fonctionnaire::count();
    $totalServices = \App\Models\Service::count();
    $totalPositions = \App\Models\Position::count();
    $totalSpecialites = \App\Models\SpecialiteGrade::count();

    // Test history data
    $totalMutations = \App\Models\HistoriqueMutation::count();
    $totalPositionHistory = \App\Models\PositionHistorique::count();

    // Test a simple filter
    $fonctionnairesWithService1 = \App\Models\Fonctionnaire::where('service_id', 1)->count();

    // Test with history
    $fonctionnairesWithMutationHistory = \App\Models\Fonctionnaire::whereHas('historiqueMutation', function($q) {
        $q->whereNotNull('nouveau_service_id');
    })->count();

    // Test some sample data
    $sampleServices = \App\Models\Service::take(5)->get(['id', 'nom']);
    $samplePositions = \App\Models\Position::take(5)->get(['id', 'nom']);
    $sampleSpecialites = \App\Models\SpecialiteGrade::take(5)->get(['id', 'nom']);

    // Test a fonctionnaire with history
    $fonctionnaireWithHistory = \App\Models\Fonctionnaire::with(['historiqueMutation', 'historiquePosition'])
        ->whereHas('historiqueMutation')
        ->first();

    return response()->json([
        'basic_counts' => [
            'fonctionnaires' => $totalFonctionnaires,
            'services' => $totalServices,
            'positions' => $totalPositions,
            'specialites' => $totalSpecialites
        ],
        'history_counts' => [
            'mutations' => $totalMutations,
            'position_history' => $totalPositionHistory
        ],
        'test_filters' => [
            'fonctionnaires_with_service_1' => $fonctionnairesWithService1,
            'fonctionnaires_with_mutation_history' => $fonctionnairesWithMutationHistory
        ],
        'sample_data' => [
            'services' => $sampleServices,
            'positions' => $samplePositions,
            'specialites' => $sampleSpecialites
        ],
        'sample_fonctionnaire_with_history' => $fonctionnaireWithHistory ? [
            'id' => $fonctionnaireWithHistory->id,
            'nom' => $fonctionnaireWithHistory->nom,
            'prenom' => $fonctionnaireWithHistory->prenom,
            'ppr' => $fonctionnaireWithHistory->ppr,
            'current_service_id' => $fonctionnaireWithHistory->service_id,
            'mutations_count' => $fonctionnaireWithHistory->historiqueMutation->count(),
            'positions_count' => $fonctionnaireWithHistory->historiquePosition->count(),
            'latest_mutation' => $fonctionnaireWithHistory->historiqueMutation->sortByDesc('date_mutation')->first(),
            'latest_position' => $fonctionnaireWithHistory->historiquePosition->sortByDesc('date_prise_en_service')->first()
        ] : null
    ]);
});

// Ultra simple diagnostic
Route::get('/diagnostic-simple', function() {
    $totalFonctionnaires = \App\Models\Fonctionnaire::count();
    $services = \App\Models\Service::count();
    $categories = \App\Models\CategorieCadre::count();

    // Test a simple filter manually
    $serviceTest = \App\Models\Fonctionnaire::where('service_id', 1)->count();
    $categorieTest = \App\Models\Fonctionnaire::whereHas('specialiteGrade.grade.cadre', function($q) {
        $q->where('categorie_cadre_id', 1);
    })->count();

    return response()->json([
        'total_fonctionnaires' => $totalFonctionnaires,
        'total_services' => $services,
        'total_categories' => $categories,
        'service_1_count' => $serviceTest,
        'categorie_1_count' => $categorieTest,
        'test_results' => [
            'service_filter_working' => $serviceTest > 0 && $serviceTest < $totalFonctionnaires,
            'categorie_filter_working' => $categorieTest > 0 && $categorieTest < $totalFonctionnaires
        ]
    ]);
});

// Test manual filter
Route::get('/test-manual-filter', function() {
    $request = request();

    // Simulate filter request with sample data
    $request->merge([
        'services' => '1,2',
        'positions' => '1',
        'search_term' => ''
    ]);

    $controller = new \App\Http\Controllers\FonctionnaireController();

    try {
        $result = $controller->dataCheckbox($request);
        return response()->json([
            'success' => true,
            'message' => 'Filter test completed successfully',
            'request_data' => $request->all()
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);
    }
});

// Test direct filter call
Route::get('/test-direct-filter', function() {
    $request = new \Illuminate\Http\Request();
    $request->merge([
        'service' => '1',
        'categorie_cadre' => '1'
    ]);

    $controller = new \App\Http\Controllers\FonctionnaireController();
    $response = $controller->data($request);

    return response()->json([
        'message' => 'Direct filter test',
        'request_sent' => $request->all(),
        'response_type' => get_class($response),
        'response_data' => $response->getData() ?? 'No data'
    ]);
});

// Test ultra simple data method
Route::get('/test-data-simple', function() {
    $controller = new \App\Http\Controllers\FonctionnaireController();
    return $controller->dataSimple(request());
});

// FILTRE AVEC CHECKBOXES ET ANNÉES
Route::get('/fonctionnaire-data-checkbox', function() {
    $controller = new \App\Http\Controllers\FonctionnaireController();
    return $controller->dataCheckbox(request());
});

// FILTRE PERSONNALISÉ OPTIMISÉ
Route::get('/fonctionnaire-data-custom', function() {
    $controller = new \App\Http\Controllers\FonctionnaireController();
    return $controller->dataCustom(request());
});

// NOUVELLE MÉTHODE DE DONNÉES
Route::get('/fonctionnaire-data-new', function() {
    $controller = new \App\Http\Controllers\FonctionnaireController();
    return $controller->dataNew(request());
});






//historique mutation
Route::post('historique-mutation/add', [HistoriqueMutationController::class, 'add'])->name('historique-mutation.add')->middleware('auth');
Route::put('historique-mutation/update/{id}', [HistoriqueMutationController::class, 'update'])->name('historique-mutation.update')->middleware('auth');
Route::delete('historique-mutation/delete/{id}', [HistoriqueMutationController::class, 'delete'])->name('historique-mutation.delete')->middleware('auth');


//historique position
Route::post('historique-position/add', [HistoriquePositionController::class, 'add'])->name('historique-position.add')->middleware('auth');
Route::put('historique-position/update/{id}', [HistoriquePositionController::class, 'update'])->name('historique-position.update')->middleware('auth');
Route::delete('historique-position/delete/{id}', [HistoriquePositionController::class, 'delete'])->name('historique-position.delete')->middleware('auth');


//Reliquat
Route::post('reliquat/add', [RelicatController::class, 'add'])->name('reliquat.add')->middleware('auth');
Route::delete('reliquat-position/delete/{id}', [RelicatController::class, 'delete'])->name('reliquat.delete')->middleware('auth');

//Batch Print - Impression en lot
Route::get('/impression-lot', [BatchPrintController::class, 'index'])->name('batch-print.index')->middleware(['auth', 'permission:batch-print.view']);
Route::post('/impression-lot/attestations', [BatchPrintController::class, 'batchAttestations'])->name('batch-print.attestations')->middleware(['auth', 'permission:batch-print.attestations']);
Route::get('/impression-lot/conge-decisions', [BatchPrintController::class, 'congeDecisions'])->name('batch-print.conge-decisions')->middleware(['auth', 'permission:batch-print.conge-decisions']);
Route::post('/impression-lot/conge-decision', [BatchPrintController::class, 'storeCongeDecision'])->name('batch-print.store-conge-decision')->middleware(['auth', 'permission:batch-print.conge-decisions']);
Route::get('/impression-lot/export-conge-decisions', [BatchPrintController::class, 'exportCongeDecisions'])->name('batch-print.export-conge-decisions')->middleware(['auth', 'permission:batch-print.conge-decisions']);
Route::get('/impression-lot/print-decision/{id}', [BatchPrintController::class, 'printSingleDecision'])->name('batch-print.print-single-decision')->middleware(['auth', 'permission:batch-print.conge-decisions']);
Route::post('/impression-lot/print-decision-with-ampliations/{id}', [BatchPrintController::class, 'printSingleDecisionWithAmpliations'])->name('batch-print.print-single-decision-with-ampliations')->middleware(['auth', 'permission:batch-print.conge-decisions']);
Route::put('/impression-lot/update-ampliations/{id}', [BatchPrintController::class, 'updateAmpliations'])->name('batch-print.update-ampliations')->middleware(['auth', 'permission:batch-print.conge-decisions']);
Route::post('/impression-lot/print-decisions-with-individual-ampliations', [BatchPrintController::class, 'printDecisionsWithIndividualAmpliations'])->name('batch-print.print-decisions-with-individual-ampliations')->middleware(['auth', 'permission:batch-print.conge-decisions']);
Route::post('/impression-lot/print-decisions', [BatchPrintController::class, 'printDecisions'])->name('batch-print.print-decisions')->middleware(['auth', 'permission:batch-print.conge-decisions']);
Route::delete('/impression-lot/delete-decision/{id}', [BatchPrintController::class, 'deleteDecision'])->name('batch-print.delete-decision')->middleware(['auth', 'permission:batch-print.conge-decisions']);

// Certificates listing & export (Listes des certificats)
Route::get('/impression-lot/certificates', [BatchPrintController::class, 'certificatesList'])->name('batch-print.certificates')->middleware(['auth', 'permission:batch-print.view']);
Route::get('/impression-lot/export-certificates-excel', [BatchPrintController::class, 'exportCertificatesExcel'])->name('batch-print.export-certificates-excel')->middleware(['auth', 'permission:batch-print.view']);
Route::get('/impression-lot/export-certificates-pdf', [BatchPrintController::class, 'exportCertificatesPdf'])->name('batch-print.export-certificates-pdf')->middleware(['auth', 'permission:batch-print.view']);

//Certificate
Route::post('certificate/add', [CertificateController::class, 'add'])->name('certificate.add')->middleware('auth');
Route::delete('certificate/delete/{id}', [CertificateController::class, 'delete'])->name('certificate.delete')->middleware('auth');

// Add this route for certificate PDF download
Route::get('/certificates/pdf/{id}', [CertificateController::class, 'pdf'])->name('certificates.pdf')->middleware('auth');

// Route for serving note files with authentication
Route::get('/files/notes/{filename}', [App\Http\Controllers\FileController::class, 'serveNoteFile'])
    ->name('files.notes')
    ->middleware('auth')
    ->where('filename', '.*');

//Tableau de bord
Route::get('/tableau-de-bord', [DashboardController::class, 'page'])->name('tableau-de-bord.page')->middleware(['auth', 'permission:administration.tableau-de-bord']);

// Statistics routes
Route::get('/statistics/detailed', [StatisticsController::class, 'detailedStatistics'])->name('statistics.detailed')->middleware(['auth']);
Route::get('/statistics/export-cadres', [StatisticsController::class, 'exportCadres'])->name('statistics.export-cadres')->middleware(['auth']);
Route::get('/statistics/export-formations', [StatisticsController::class, 'exportFormations'])->name('statistics.export-formations')->middleware(['auth']);
Route::get('/statistics/formation-fonctionnaires/{formation}', [StatisticsController::class, 'getFormationFonctionnaires'])->name('statistics.formation-fonctionnaires')->middleware(['auth']);
Route::get('/statistics/hr', [StatisticsController::class, 'hrStatistics'])->name('statistics.hr')->middleware(['auth', 'permission:administration.statistics-hr']);
Route::get('/statistics/hr/test', [StatisticsController::class, 'testHrStatistics'])->name('statistics.hr.test');

// AI Analysis routes
Route::get('/statistics/ai-analyses', [StatisticsController::class, 'aiAnalyses'])->name('statistics.ai-analyses')->middleware(['auth', 'permission:statistics.ai-analyses']);
Route::post('/statistics/ai-analyses/generate', [StatisticsController::class, 'generateAIAnalysis'])->name('statistics.ai-analyses.generate')->middleware(['auth', 'permission:statistics.ai-analyses']);
Route::post('/statistics/ai-analyses/export-pdf', [StatisticsController::class, 'exportAnalysisPDF'])->name('statistics.ai-analyses.export-pdf')->middleware(['auth', 'permission:statistics.ai-analyses']);

Route::resource('greves', GreveController::class)->middleware(['auth', 'permission:greves.view']);
// Greves per fonctionnaire
Route::get('/greves/fonctionnaire/{id}', [GreveController::class, 'forFonctionnaire'])->name('greves.for-fonctionnaire')->middleware(['auth', 'permission:greves.view']);
Route::post('/greves/export-fonctionnaire-excel', [GreveController::class, 'exportForFonctionnaireExcel'])->name('greves.export-fonctionnaire-excel')->middleware(['auth', 'permission:greves.export']);
Route::post('/greves/export-fonctionnaire-pdf', [GreveController::class, 'exportForFonctionnairePdf'])->name('greves.export-fonctionnaire-pdf')->middleware(['auth', 'permission:greves.export']);
// Export all greves
Route::post('/greves/export-all-excel', [GreveController::class, 'exportAllExcel'])->name('greves.export-all-excel')->middleware(['auth', 'permission:greves.export']);

// Document Search routes
Route::get('/documents/search', [DocumentSearchController::class, 'index'])->name('documents.search')->middleware(['auth', 'permission:documents.search']);
// Debug route (no permission middleware) - temporary for testing page issues
Route::get('/documents/search-debug', [DocumentSearchController::class, 'index'])->name('documents.search.debug')->middleware('auth');
Route::post('/documents/search', [DocumentSearchController::class, 'search'])->name('documents.search.post')->middleware(['auth', 'permission:documents.search']);
Route::post('/documents/search/print', [DocumentSearchController::class, 'printResults'])->name('documents.search.print')->middleware(['auth', 'permission:documents.search']);
Route::post('/documents/note-service', [DocumentSearchController::class, 'generateNoteService'])->name('documents.note-service')->middleware(['auth', 'permission:documents.note-service']);
Route::get('/documents/export-conges-form', [DocumentSearchController::class, 'showExportCongesForm'])->name('documents.export-conges-form')->middleware(['auth', 'permission:documents.export-conges']);
Route::post('/documents/search-greves', [DocumentSearchController::class, 'searchGreves'])->name('documents.search-greves')->middleware(['auth', 'permission:documents.search']);
Route::post('/documents/export-greves', [DocumentSearchController::class, 'exportGreves'])->name('documents.export-greves')->middleware(['auth', 'permission:documents.export-greves']);
Route::post('/documents/export-greves-pdf', [DocumentSearchController::class, 'exportGrevesPdf'])->name('documents.export-greves-pdf')->middleware(['auth', 'permission:documents.export-greves']);

// User Management routes
Route::get('/utilisateurs', [UserController::class, 'page'])->name('users.page')->middleware(['auth', 'permission:users.view']);
Route::get('/users/data', [UserController::class, 'data'])->name('users.data')->middleware(['auth', 'permission:users.view']);
Route::post('/users', [UserController::class, 'store'])->name('users.store')->middleware(['auth', 'permission:users.create']);
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show')->middleware(['auth', 'permission:users.view']);
Route::get('/users/{id}/permissions', [UserController::class, 'showPermissions'])->name('users.permissions')->middleware(['auth', 'permission:users.view']);
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update')->middleware(['auth', 'permission:users.edit']);
Route::post('/users/{id}/reset-password', [UserController::class, 'resetPassword'])->name('users.reset-password')->middleware(['auth']);
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy')->middleware(['auth', 'permission:users.delete']);

// Role Management routes
Route::post('/roles', [UserController::class, 'storeRole'])->name('roles.store')->middleware(['auth', 'permission:roles.create']);
Route::get('/roles/{id}', [UserController::class, 'showRole'])->name('roles.show')->middleware(['auth', 'permission:roles.view']);
Route::put('/roles/{id}', [UserController::class, 'updateRole'])->name('roles.update')->middleware(['auth', 'permission:roles.edit']);
Route::delete('/roles/{id}', [UserController::class, 'destroyRole'])->name('roles.destroy')->middleware(['auth', 'permission:roles.delete']);

// Route pour vérifier les permissions existantes
Route::get('/check-permissions-status', function() {
    $permissions = \Spatie\Permission\Models\Permission::all();
    $roles = \Spatie\Permission\Models\Role::with('permissions')->get();

    return response()->json([
        'total_permissions' => $permissions->count(),
        'permissions_by_module' => $permissions->groupBy(function($permission) {
            return explode('.', $permission->name)[0];
        })->map(function($group) {
            return $group->pluck('name')->sort()->values();
        }),
        'roles_summary' => $roles->map(function($role) {
            return [
                'name' => $role->name,
                'permissions_count' => $role->permissions->count(),
                'permissions' => $role->permissions->pluck('name')->sort()->values()
            ];
        })
    ]);
});

// Route pour créer toutes les permissions manquantes
Route::get('/create-all-permissions', function() {
    $allPermissions = [
        // Administration
        'administration.tableau-de-bord',

        // Utilisateurs et Rôles
        'users.view',
        'users.create',
        'users.edit',
        'users.delete',
        'roles.view',
        'roles.create',
        'roles.edit',
        'roles.delete',

        // Fonctionnaires
        'fonctionnaires.view',
        'fonctionnaires.create',
        'fonctionnaires.edit',
        'fonctionnaires.delete',
        'fonctionnaires.import',
        'fonctionnaires.export',

        // Cadres
        'cadres.view',
        'cadres.create',
        'cadres.edit',
        'cadres.delete',
        'cadres.export',
        'cadres.categories-cadres',
        'cadres.grades-cadres',

        // Formations
        'formations.view',
        'formations.create',
        'formations.edit',
        'formations.delete',
        'formations.categories-formation',
        'formations.nom-formation-sanitaire',

        // Stages
        'stages.view',
        'stages.create',
        'stages.edit',
        'stages.delete',
        'stages.attestation',
        'stages.manage-ecoles',
        'stages.manage-encadrants',
        'stages.manage-intitule-formations',

        // Congés
        'conges.view',
        'conges.create',
        'conges.edit',
        'conges.delete',
        'conges.decisions',

        // Mutations
        'mutations.view',
        'mutations.create',
        'mutations.edit',
        'mutations.delete',

        // Grèves
        'greves.view',
        'greves.create',
        'greves.edit',
        'greves.delete',

        // Documents
        'documents.search',
        'documents.export-conges',
        'documents.export-greves',
        'documents.note-service',

        // Statistiques
        'statistics.view',
        'statistics.detailed',
        'statistics.hr',
        'statistics.ai-analyses',

        // Retraites
        'retraites.view',
        'retraites.create',
        'retraites.edit',
        'retraites.delete',

        // Impression en lot
        'batch-print.view',
        'batch-print.conge-decisions',

        // Journal d'activité
        'activity-logs.view',

        // Paramétrage
        'parametrage.regions',
        'parametrage.villes',
        'parametrage.arrondissements-communes',
        'parametrage.grades',
        'parametrage.fonctions',
        'parametrage.services',
        'parametrage.positions',
        'parametrage.specialite-grade',
        'parametrage.type-categorie-formation',
        'parametrage.niveau-categorie-formation',
        'parametrage.types-conges',
        'parametrage.type-mutations',
        'parametrage.certificats'
    ];

    $created = [];
    $existing = [];

    foreach ($allPermissions as $permission) {
        if (!\Spatie\Permission\Models\Permission::where('name', $permission)->exists()) {
            \Spatie\Permission\Models\Permission::create(['name' => $permission]);
            $created[] = $permission;
        } else {
            $existing[] = $permission;
        }
    }

    return response()->json([
        'message' => 'Permissions créées avec succès',
        'total_permissions' => count($allPermissions),
        'created_count' => count($created),
        'existing_count' => count($existing),
        'created_permissions' => $created,
        'existing_permissions' => $existing
    ]);
});

// Route pour assigner toutes les permissions au Super Admin
Route::get('/assign-all-permissions-to-super-admin', function() {
    $superAdminRole = \Spatie\Permission\Models\Role::where('name', 'Super Admin')->first();

    if (!$superAdminRole) {
        // Créer le rôle Super Admin s'il n'existe pas
        $superAdminRole = \Spatie\Permission\Models\Role::create(['name' => 'Super Admin']);
    }

    $allPermissions = \Spatie\Permission\Models\Permission::all();
    $superAdminRole->syncPermissions($allPermissions);

    return response()->json([
        'message' => 'Toutes les permissions ont été assignées au Super Admin',
        'role' => $superAdminRole->name,
        'total_permissions_assigned' => $allPermissions->count(),
        'permissions' => $allPermissions->pluck('name')->sort()->values()
    ]);
});

// Route pour tester les permissions d'un utilisateur connecté
Route::get('/test-my-permissions', function() {
    $user = auth()->user();
    if (!$user) {
        return response()->json(['error' => 'Non connecté']);
    }

    $testRoutes = [
        'cadres.view' => '/cadres',
        'formations.categories-formation' => '/categories-formation',
        'formations.nom-formation-sanitaire' => '/nom-formation-sanitaire',
        'documents.search' => '/documents/search',
        'stages.view' => '/stages',
        'statistics.view' => '/statistics/detailed',
        'users.view' => '/utilisateurs'
    ];

    $results = [];
    foreach ($testRoutes as $permission => $route) {
        $hasAccess = $user->can($permission);
        $results[] = [
            'permission' => $permission,
            'route' => $route,
            'access' => $hasAccess ? '✅ AUTORISÉ' : '❌ REFUSÉ'
        ];
    }

    return response()->json([
        'user' => $user->name,
        'roles' => $user->roles->pluck('name'),
        'total_permissions' => $user->getAllPermissions()->count(),
        'access_tests' => $results
    ]);
})->middleware('auth');

// Route pour tester les permissions d'un utilisateur spécifique
Route::get('/test-user-permissions/{email}', function($email) {
    $user = \App\Models\User::where('email', $email)->with(['roles', 'permissions'])->first();

    if (!$user) {
        return response()->json(['error' => 'Utilisateur non trouvé']);
    }

    $testRoutes = [
        'cadres.categories-cadres' => '/categories-cadres',
        'cadres.view' => '/cadres',
        'cadres.grades-cadres' => '/grades-cadres',
        'parametrage.specialite-grade' => '/specialites-cadres',
        'formations.categories-formation' => '/categories-formation',
        'parametrage.type-categorie-formation' => '/type-categories-formation',
        'parametrage.niveau-categorie-formation' => '/niveau-categories-formation',
        'formations.nom-formation-sanitaire' => '/nom-formation-sanitaire',
        'documents.search' => '/documents/search'
    ];

    $results = [];
    foreach ($testRoutes as $permission => $route) {
        $hasAccess = $user->can($permission);
        $results[] = [
            'permission' => $permission,
            'route' => $route,
            'access' => $hasAccess ? '✅ AUTORISÉ' : '❌ REFUSÉ'
        ];
    }

    return response()->json([
        'user' => [
            'name' => $user->name,
            'email' => $user->email
        ],
        'roles' => $user->roles->pluck('name'),
        'total_permissions' => $user->getAllPermissions()->count(),
        'access_tests' => $results
    ]);
});

// Route pour tester les fonctionnalités de gestion des utilisateurs
Route::get('/test-user-management', function() {
    $currentUser = auth()->user();
    if (!$currentUser) {
        return response()->json(['error' => 'Non connecté']);
    }

    $permissions = [
        'users.view' => 'Voir les utilisateurs',
        'users.create' => 'Créer des utilisateurs',
        'users.edit' => 'Modifier des utilisateurs',
        'users.delete' => 'Supprimer des utilisateurs'
    ];

    $userPermissions = [];
    foreach ($permissions as $permission => $description) {
        $userPermissions[$permission] = [
            'description' => $description,
            'has_permission' => $currentUser->can($permission),
            'status' => $currentUser->can($permission) ? '✅ AUTORISÉ' : '❌ REFUSÉ'
        ];
    }

    return response()->json([
        'current_user' => [
            'name' => $currentUser->name,
            'email' => $currentUser->email,
            'roles' => $currentUser->roles->pluck('name')
        ],
        'user_management_permissions' => $userPermissions,
        'available_features' => [
            'view_users' => $currentUser->can('users.view'),
            'create_users' => $currentUser->can('users.create'),
            'edit_users' => $currentUser->can('users.edit'),
            'delete_users' => $currentUser->can('users.delete'),
            'manage_roles' => $currentUser->can('roles.create') || $currentUser->can('roles.edit')
        ]
    ]);
})->middleware('auth');

// Route pour s'assurer que le Super Admin a toutes les permissions
Route::get('/fix-super-admin-permissions', function() {
    $superAdminRole = \Spatie\Permission\Models\Role::where('name', 'Super Admin')->first();

    if (!$superAdminRole) {
        return response()->json(['error' => 'Rôle Super Admin non trouvé']);
    }

    // Récupérer toutes les permissions existantes
    $allPermissions = \Spatie\Permission\Models\Permission::all();

    // Assigner toutes les permissions au Super Admin
    $superAdminRole->syncPermissions($allPermissions);

    // Vérifier les permissions spécifiques pour la gestion des utilisateurs
    $userPermissions = [
        'users.view',
        'users.create',
        'users.edit',
        'users.delete'
    ];

    $missingPermissions = [];
    foreach ($userPermissions as $permission) {
        if (!$superAdminRole->hasPermissionTo($permission)) {
            $missingPermissions[] = $permission;
        }
    }

    return response()->json([
        'message' => 'Permissions du Super Admin mises à jour',
        'total_permissions' => $allPermissions->count(),
        'user_management_permissions' => $userPermissions,
        'missing_permissions' => $missingPermissions,
        'super_admin_has_all_permissions' => empty($missingPermissions)
    ]);
});

// Route pour vérifier le statut Super Admin
Route::get('/check-super-admin-status', function() {
    $user = auth()->user();
    if (!$user) {
        return response()->json(['error' => 'Non connecté']);
    }

    return response()->json([
        'user' => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email
        ],
        'roles' => $user->roles->pluck('name'),
        'is_super_admin' => $user->hasRole('Super Admin'),
        'has_users_view' => $user->can('users.view'),
        'has_users_edit' => $user->can('users.edit'),
        'has_users_delete' => $user->can('users.delete'),
        'all_permissions' => $user->getAllPermissions()->pluck('name')->sort()->values()
    ]);
})->middleware('auth');

// Activity Log routes
Route::get('/journal-activite', [ActivityLogController::class, 'index'])->name('activity-logs.index')->middleware(['auth', 'permission:activity-logs.view']);
Route::get('/activity-logs/data', [ActivityLogController::class, 'data'])->name('activity-logs.data')->middleware(['auth', 'permission:activity-logs.view']);
Route::get('/activity-logs/{id}', [ActivityLogController::class, 'show'])->name('activity-logs.show')->middleware(['auth', 'permission:activity-logs.view']);
Route::get('/activity-logs/filters/log-names', [ActivityLogController::class, 'getLogNames'])->name('activity-logs.log-names')->middleware('auth');
Route::get('/activity-logs/filters/events', [ActivityLogController::class, 'getEvents'])->name('activity-logs.events')->middleware('auth');
Route::get('/activity-logs/filters/users', [ActivityLogController::class, 'getUsers'])->name('activity-logs.users')->middleware('auth');
Route::get('/activity-logs/filters/subject-types', [ActivityLogController::class, 'getSubjectTypes'])->name('activity-logs.subject-types')->middleware('auth');

// Retirement Management routes
Route::get('/retraites', [RetraiteController::class, 'index'])->name('retraites.index')->middleware(['auth', 'permission:retraites.view']);
Route::get('/retraites/data', [RetraiteController::class, 'data'])->name('retraites.data')->middleware(['auth', 'permission:retraites.view']);
Route::post('/retraites', [RetraiteController::class, 'store'])->name('retraites.store')->middleware(['auth', 'permission:retraites.create']);
Route::get('/retraites/{id}', [RetraiteController::class, 'show'])->name('retraites.show')->middleware(['auth', 'permission:retraites.view']);
Route::put('/retraites/{id}', [RetraiteController::class, 'update'])->name('retraites.update')->middleware(['auth', 'permission:retraites.edit']);
Route::delete('/retraites/{id}', [RetraiteController::class, 'destroy'])->name('retraites.destroy')->middleware(['auth', 'permission:retraites.delete']);
Route::post('/retraites/{id}/validate', [RetraiteController::class, 'validate'])->name('retraites.validate')->middleware(['auth', 'permission:retraites.validate']);
Route::get('/retraites/filters/fonctionnaires', [RetraiteController::class, 'getFonctionnaires'])->name('retraites.fonctionnaires')->middleware('auth');
Route::get('/retraites/filters/eligible', [RetraiteController::class, 'getEligibleFonctionnaires'])->name('retraites.eligible')->middleware('auth');
Route::post('/retraites/auto-create', [RetraiteController::class, 'createAutoRetirements'])->name('retraites.auto-create')->middleware('auth');
Route::get('/retraites/settings', [RetraiteController::class, 'getRetirementSettings'])->name('retraites.settings')->middleware('auth');
Route::post('/retraites/settings', [RetraiteController::class, 'updateRetirementSettings'])->name('retraites.settings.update')->middleware('auth');

// Test routes
Route::get('/test-retraites', function() {
    return view('test-retraites');
})->middleware('auth');
Route::get('/test-retraites-api', [RetraiteController::class, 'testRetirementFunctions'])->middleware('auth');

// Temporary route without middleware for testing
Route::get('/retraites/settings-test', [RetraiteController::class, 'getRetirementSettings']);
Route::get('/test-simple', function() {
    return response()->json(['test' => 'working', 'age_limit' => App\Models\RetirementSetting::getRetirementAgeLimit()]);
});

// Routes pour la gestion des stages
Route::get('/stages', [StageController::class, 'index'])->name('stages.index')->middleware(['auth', 'permission:stages.view']);
Route::get('/stages/data', [StageController::class, 'data'])->name('stages.data')->middleware(['auth', 'permission:stages.view']);
Route::get('/stages/create', [StageController::class, 'create'])->name('stages.create')->middleware(['auth', 'permission:stages.create']);
Route::post('/stages', [StageController::class, 'store'])->name('stages.store')->middleware(['auth', 'permission:stages.create']);
Route::get('/stages/{id}', [StageController::class, 'show'])->name('stages.show')->middleware(['auth', 'permission:stages.view']);
Route::get('/stages/{id}/edit', [StageController::class, 'edit'])->name('stages.edit')->middleware(['auth', 'permission:stages.edit']);
Route::put('/stages/{id}', [StageController::class, 'update'])->name('stages.update')->middleware(['auth', 'permission:stages.edit']);
Route::delete('/stages/{id}', [StageController::class, 'destroy'])->name('stages.destroy')->middleware(['auth', 'permission:stages.delete']);
Route::get('/stages/export/excel', [StageController::class, 'export'])->name('stages.export')->middleware(['auth', 'permission:stages.export']);
Route::get('/stages/export/pdf', [StageController::class, 'pdf'])->name('stages.pdf')->middleware(['auth', 'permission:stages.export']);
Route::get('/stages/attestation/{id}', [StageController::class, 'attestation'])->name('stages.attestation')->middleware(['auth', 'permission:stages.attestation']);
Route::get('/stages/note-stage/{id}', [StageController::class, 'noteStage'])->name('stages.note-stage')->middleware(['auth', 'permission:stages.attestation']);
Route::get('/api/stages/{id}', [StageController::class, 'getStageData'])->name('api.stages.show')->middleware(['auth', 'permission:stages.view']);
Route::post('/stages/note-pdf', [StageController::class, 'generateNotePDF'])->name('stages.note-pdf')->middleware(['auth', 'permission:stages.view']);

// Routes AJAX pour la gestion des entités liées
// Écoles
Route::get('/api/ecoles', [EcoleController::class, 'index'])->name('api.ecoles.index')->middleware(['auth', 'permission:stages.manage-ecoles']);
Route::get('/api/ecoles/data', [EcoleController::class, 'data'])->name('api.ecoles.data')->middleware(['auth', 'permission:stages.manage-ecoles']);
Route::post('/api/ecoles', [EcoleController::class, 'store'])->name('api.ecoles.store')->middleware(['auth', 'permission:stages.manage-ecoles']);
Route::get('/api/ecoles/{id}', [EcoleController::class, 'show'])->name('api.ecoles.show')->middleware(['auth', 'permission:stages.manage-ecoles']);
Route::put('/api/ecoles/{id}', [EcoleController::class, 'update'])->name('api.ecoles.update')->middleware(['auth', 'permission:stages.manage-ecoles']);
Route::delete('/api/ecoles/{id}', [EcoleController::class, 'destroy'])->name('api.ecoles.destroy')->middleware(['auth', 'permission:stages.manage-ecoles']);

// Options
Route::get('/api/options', [OptionController::class, 'index'])->name('api.options.index')->middleware(['auth', 'permission:stages.manage-options']);
Route::get('/api/options/data', [OptionController::class, 'data'])->name('api.options.data')->middleware(['auth', 'permission:stages.manage-options']);
Route::post('/api/options', [OptionController::class, 'store'])->name('api.options.store')->middleware(['auth', 'permission:stages.manage-options']);
Route::get('/api/options/{id}', [OptionController::class, 'show'])->name('api.options.show')->middleware(['auth', 'permission:stages.manage-options']);
Route::put('/api/options/{id}', [OptionController::class, 'update'])->name('api.options.update')->middleware(['auth', 'permission:stages.manage-options']);
Route::delete('/api/options/{id}', [OptionController::class, 'destroy'])->name('api.options.destroy')->middleware(['auth', 'permission:stages.manage-options']);

// Encadrants
Route::get('/api/encadrants', [EncadrantController::class, 'index'])->name('api.encadrants.index')->middleware(['auth', 'permission:stages.manage-encadrants']);
Route::get('/api/encadrants/data', [EncadrantController::class, 'data'])->name('api.encadrants.data')->middleware(['auth', 'permission:stages.manage-encadrants']);
Route::post('/api/encadrants', [EncadrantController::class, 'store'])->name('api.encadrants.store')->middleware(['auth', 'permission:stages.manage-encadrants']);
Route::get('/api/encadrants/{id}', [EncadrantController::class, 'show'])->name('api.encadrants.show')->middleware(['auth', 'permission:stages.manage-encadrants']);
Route::put('/api/encadrants/{id}', [EncadrantController::class, 'update'])->name('api.encadrants.update')->middleware(['auth', 'permission:stages.manage-encadrants']);
Route::delete('/api/encadrants/{id}', [EncadrantController::class, 'destroy'])->name('api.encadrants.destroy')->middleware(['auth', 'permission:stages.manage-encadrants']);

// Types de Stage
Route::get('/api/type-stages', [TypeStageController::class, 'index'])->name('api.type-stages.index')->middleware(['auth']);
Route::get('/api/type-stages/data', [TypeStageController::class, 'data'])->name('api.type-stages.data')->middleware(['auth']);
Route::post('/api/type-stages', [TypeStageController::class, 'store'])->name('api.type-stages.store')->middleware(['auth']);
Route::get('/api/type-stages/{id}', [TypeStageController::class, 'show'])->name('api.type-stages.show')->middleware(['auth']);
Route::put('/api/type-stages/{id}', [TypeStageController::class, 'updateApi'])->name('api.type-stages.update')->middleware(['auth']);
Route::delete('/api/type-stages/{id}', [TypeStageController::class, 'destroy'])->name('api.type-stages.destroy')->middleware(['auth']);

// Intitulés de Formation
Route::get('/api/intitule-formations', [IntituleFormationController::class, 'index'])->name('api.intitule-formations.index')->middleware(['auth', 'permission:stages.manage-intitule-formations']);
Route::post('/api/intitule-formations', [IntituleFormationController::class, 'store'])->name('api.intitule-formations.store')->middleware(['auth', 'permission:stages.manage-intitule-formations']);
Route::put('/api/intitule-formations/{id}', [IntituleFormationController::class, 'update'])->name('api.intitule-formations.update')->middleware(['auth', 'permission:stages.manage-intitule-formations']);
Route::delete('/api/intitule-formations/{id}', [IntituleFormationController::class, 'destroy'])->name('api.intitule-formations.destroy')->middleware(['auth', 'permission:stages.manage-intitule-formations']);
