<?php


use App\Http\Controllers\noteController;
use App\Http\Controllers\TesterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\acteurcontroller;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AdminController as ControllersAdminController;
use App\Http\Controllers\annonceController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\clientcontroller;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrestataireController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StagaireController;
use App\Http\Controllers\userController;
use App\Http\Middleware\login;
use App\Models\Prestataire;
use GuzzleHttp\Middleware;
use Illuminate\Foundation\Configuration\Middleware as ConfigurationMiddleware;

Route::get('/', [HomeController::class, 'index'])->name('accueil');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [ControllersAdminController::class, 'index'])->name('admin');


     // Services
Route::post('/admin/services/{id}/valider', [ControllersAdminController::class, 'validerService'])->name('admin.service.valider');
Route::post('/admin/services/{id}/rejeter', [ControllersAdminController::class, 'rejeterService'])->name('admin.service.rejeter');
Route::delete('/admin/services/{id}/supprimer', [ControllersAdminController::class, 'supprimerService'])->name('admin.service.supprimer');

    Route::post('/admin/plainte/{id}/resoudre', [ControllersAdminController::class, 'resoudre'])
    ->name('admin.plainte.resoudre');


  
    // Utilisateurs
Route::post('/admin/users/{id}/suspendre', [ControllersAdminController::class, 'suspendreUser'])->name('admin.user.suspendre');
Route::delete('/admin/users/{id}/supprimer', [ControllersAdminController::class, 'supprimerUser'])->name('admin.user.supprimer');

  

});
Route::middleware(['auth', 'prestataire'])->group(function () {
    Route::get('/prestataire/dashboard', [PrestataireController::class, 'index'])->name('prestataire');
    Route::post('/service', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/publier', [ServiceController::class, 'create'])->name('publier');
    Route::get('/service_prestataire', [PrestataireController::class, 'service_prestataire'])->name('service_prestataire');
    Route::get('/service/{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');
    Route::put('/service/{id}', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');
    Route::put('/reservations/{id}/update-status', [App\Http\Controllers\ReservationController::class, 'updateStatus'])->name('reservation.updateStatus');


    Route::get('/reservations', [PrestataireController::class, 'reservation_prestataire'])->name('reservation_prestataire');


});

// Route::middleware('client')->get('/client/home', [ClientController::class, 'index'])->name('accueil');

Route::get('/mesreservation', [ReservationController::class, 'mesReservations'])->name('mesreservation')->middleware('auth');


Route::get('/reserver/{id}', [ReservationController::class, 'form'])->name('reservation.form');

Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');

Route::get('/profil', [UserController::class, 'profil'])->name('profil');
Route::put('/profil/update', [UserController::class, 'update'])->name('profile.update');


Route::get('/service', [ServiceController::class, 'index'])->name('service');
Route::post('/service', [ServiceController::class, 'store'])->name('service.store')->middleware(['auth']);
Route::get('/services/search', [ServiceController::class, 'search'])->name('services.search');
Route::post('/evaluation', [EvaluationController::class, 'store'])->name('evaluation.store');
Route::get('/service/{id}', [ServiceController::class, 'show'])->name('service_show');

Route::get('/recherche', [ServiceController::class, 'recherche'])->name('recherche');
Route::get('/prestataire/{id}', [userController::class, 'show'])->name('prestataire_profile');


Route::post('/contact', [clientcontroller::class, 'sendMessage'])->name('contact.send');

Route::get('/contact', [clientcontroller::class, 'contact'])->name('contact');



Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/mesreservation', [ReservationController::class, 'mesReservations'])->name('mesreservation')->middleware('auth');





























































































// Route::middleware(['auth', 'role.admin'])->group(function () {
//     Route::get('/admin', function () {
//         return view('admin');
//     })->name('admin');
// });

// Route::middleware(['auth', 'role.prestataire'])->group(function () {
//     Route::get('/prestataire', function () {
//         return view('prestataire');
//     })->name('prestataire');

//     Route::get('/publier', function () {
//         return view('publier');
//     })->name('publier');
// });


// PFE
//  Route::get('/', function(){
//      return view('accueil');
//  })->name('accueil');


//  Route::get('/service',function(){
//      return view('service');})->name('service');


//   Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
//   Route::post('/login', [AuthController::class, 'login']);
//  Route::get('/connexion', function(){
//      return view('connexion');
//  })->name('connexion');
//  Route::get('/inscrire', function(){
//      return view('inscrire');
//  })->name('inscrire');


//  Route::get('/contact', function(){
//      return view('contact');
//  })->name('contact');






//  Route::get('/prestataire', function(){
//     return view('prestataire');
//  })->name('prestataire');
 
//  Route::get('/publier', function(){
//     return view('publier');
//  })->name('publier');

// Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/register', [AuthController::class, 'register'])->name('register');
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::group(['middleware' => ['auth']], function () {
//     Route::get('/mesreservation', [ReservationController::class, 'index'])->name('MesR')->middleware('role.client');
//     Route::get('/admin', fn() => view('admin'))->name('admin')->middleware('role.admin');
//     Route::get('/prestataire', fn() => view('prestataire'))->name('prestataire')->middleware('role.prestataire');
// });
// //  Route::get('/admin', [AdminController::class, 'index'])->middleware('admin');











































//PROJET STAGE
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified','role:Secretaire'])->name('dashboard');

// Route::get('/Add', function () {
//     return view('Add');
// })->middleware(['auth', 'verified'])->name('Add');

// Route::middleware(['auth', 'verified','role:Secretaire'])->group(function () {
//     Route::post('/addEmploye', [RegisteredUserController::class, 'addEmploye'])->name('addEmploye');
//     Route::get('/modifyEmploye', [RegisteredUserController::class, 'modify'])->name('modifyEmploye');
//     Route::get('/pointages', [RegisteredUserController::class, 'pointages'])->name('pointages');
//     Route::put('/pointages/{id}', [RegisteredUserController::class, 'systmepointages'])->name('systmepointages');
//     Route::put('/modifyEmploye/{id}', [RegisteredUserController::class, 'updateEmploye'])->name('updateEmploye');
//     Route::delete('/modifyEmploye/{id}', [RegisteredUserController::class, 'destroy'])->name('destroyEmploye');
// });
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__ . '/auth.php';






























 



 


























//ex1
// Route::get('/home', function(){
//     return view('homeM');
// })->name('login');

// Route::post('/loginh', function(Request $request){
//     //  if($request->has(["usename","password"])&& $request->usename=="admin" && $request->password=="home")
//     //  session()->put('usename', $request->usename);
//     return redirect()->route('dashbord');
// })->name('loginh');

// Route::get('/dashbord', function(){
//     return view('dashbord');
// })->name('dashbord');




























//EX2
// Route::get('/hh', function () {
//          return view('hh');
//     });



//  Route::get('/home', function () {
//       return view('home');
//   })->name('home');


// Route::get('/service', function () {
// //       $prestataires = Prestataire::all(); 
//      return view('service');
//  })->name('service');

//  Route::resource("/annonce",annonceController::class);
// Route::get('/client', [clientcontroller::class, 'afficher']);

//Route::get('/acteurs', [acteurcontroller::class, 'Index'])->name('acteur.index');
// Route::get('/acteur/create', [acteurcontroller::class, 'Create'])->name('acteur.create');
// Route::post('/acteur', [acteurcontroller::class, 'Store'])->name('acteur.store');
// Route::get('/acteur/{id}/edit', [acteurcontroller::class, 'Edit'])->name('acteur.edit');
// Route::put('/acteur/{id}', [acteurcontroller::class, 'Update'])->name('acteur.update');
// Route::delete('/acteur/{id}', [acteurcontroller::class, 'Destroy'])->name('acteur.destroy');


// Route::get('/tajriba/{n}',function($n,$x){ 
//     $x=7 ;
//     return 'Bonjour '.$n. 'votre age est '.$x. 'ans'  ;
//     });
    


// Route::get('/', function () {
//        return view('welcome');
    
// });
//  Route::get('/',[Authcontroller::class,'Show']);
 //  Route::post('/login',[Authcontroller::class,'connect'])->name('signin');



    

// Route::get('/notes',[noteController::class,'notes']);
// Route::get('/notes/statistiques',[noteController::class,'statistiques']);




//  Route::get('/', function () {
//      return view('layouts');

//  });

//  Route::get('/resultat',[noteController::class,'notes'])->name('resultat');

//  Route::get('/contact', function () {
//     return view('contact');})->name('contact');

//  Route::get('/presentation', function () {
//      return view('accueil');

//  })->name('presentation');




 // Rediction
// // Q1
// Route::get('/page',function(){
//     return redirect()->route('dash');
// });
// Route::get('/nouvelle-page',function(){
//     return "Bienvenue sur la nouvelle page !";
// })->name('dash');
// //Q2
// Route::get('/dashboard',function(){
//     return redirect()->route('dashboard');
// });
// Route::get('/rediriger-dashboard',function(){
//     return "Bienvenue sur le tableau de bord !";
// })->name('dashboard');
// //Q3
// Route::get('/profil/{id}',function($id){
    
//     return "Profil de l'utilisateur ID : ".$id;
// })->name('profil');
// Route::get('/rediriger-profil',function(){
//     return redirect()->route('profil', ['id' => 10]);
// });
// //Q4
// Route::get('/connexion',function(){
//     return view('tp1-rediction');
// });
// Route::get('/traiter-connexion',function(){
//     return redirect('/connexion')->with('x', 'Connexion réussie !');
// });

















//Controle N1








 















// Route::view('/form','form');
// Route::post('/valider',function(Request $req){

// $nom=$req -> nom;
// $email=$req -> email;
//     return view('valider',["nom"=>$nom,"email"=>$email]);

// });







// Route::get('/home/{n}/{x}', function($n,$x) {
//     return 'Bonjour ' . $n .' votre age est '. $x.' ans';
//     });
// Route::get('/home/{n}', function($n) {
//     return 'Bonjour ' . $n ;
//     });

// route::get('/home',function(){
//     return 'bonjour laravel';

// });
// route::get("/acceuil",function (){
//     return view('acceuil')->name('accueil');
// });
// route::get("/tester",[TesterController::class,'index']);
//  route::get("/tester",[TesterController::class,'Show']);
























