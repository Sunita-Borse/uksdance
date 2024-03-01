<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SyllabusController;
use App\Http\Controllers\ResourcesController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\QuestionPaperController;
use App\Models\Syllabus;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;

//use App\Models\Syllabus;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/',function () {
//     return view('welcome');
// });



Route::get('/register',[AuthController::class,'loadRegister']);
Route::post('/register',[AuthController::class,'studentRegister'])->name('studentRegister');


// Route::get('/',function(){
//   return redirect ('/');

// });


Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'Auth\LoginController@login');
//Route::get('/',[AuthController::class, 'loadlogin']);
//Route::post('/',[AuthController::class, 'userLogin'])->name('Login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/forgot-password',[Authcontroller::class,'forgotpasswordload']);
Route::post('/forgot-password',[Authcontroller::class,'forgotpassword'])->name('forgotpassword');

Route::get('/reset-password',[Authcontroller::class,'resetpasswordload']);
Route::post('/reset-password',[Authcontroller::class,'resetpassword'])->name('resetpassword');

Route::get('/newstudent', [SyllabusController::class, 'addnewstudent']);
Route::post('/newstudent', [SyllabusController::class, 'savenewstudent']);

Route::group(['middleware'=>['web','checkAdmin']],function(){
  Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard'])->name('admin.dashboard');

  //Route::get('/admin/{id}', [AdminController::class,'approveStudent'])->name('admin.approveStudent');
   //Route::get('/admin/{id}/approve', [AdminController::class, 'approveStudent'])->name('admin.approveStudent');
   Route::get('/admin/approve/{student}', [AdminController::class, 'approveStudent'])->name('admin.approveStudent');

  Route::get('/admin/temporary-route/{id}', function ($id) {
   return ('welcome');
})->name('admin.temporary.route');

  Route::get('/admin/add-student',[AdminController::class,'addstudent']);
  Route::post('/admin/add-student',[AdminController::class,'savestudent']);
  Route::get('/admin/allstudents',[AdminController::class,'show'])->name('admin.show');
  Route::get('/admin/syllabus',[AdminController::class,'addsyllabus']);
  Route::post('/admin/syllabus',[AdminController::class,'store']);
  Route::get('/admin/prarmbhik',[AdminController::class,'showprarmbhik']);
Route::post('/admin/prarmbhik',[AdminController::class,'store']);
Route::get('/admin/praveshika-pratham',[AdminController::class,'prathamshow']);
Route::post('/admin/praveshika-pratham',[AdminController::class,'store']);
Route::get('/admin/praveshika-purna',[AdminController::class,'praveshikashow']);
Route::post('/admin/praveshika-purna',[AdminController::class,'store']);
Route::get('/admin/madhyama-pratham',[AdminController::class,'madhyamashow']);
Route::post('/admin/madhyama-pratham',[AdminController::class,'store']);

Route::get('/admin/madhyama-purna',[AdminController::class,'madhyamapurnashow']);
Route::post('/admin/madhyama-purna',[AdminController::class,'store']);



Route::get('/admin/visharad-purna',[AdminController::class,'visharadpurnashow']);
Route::post('/admin/visharad-purna',[AdminController::class,'store']);

Route::get('/admin/visharad-pratham',[AdminController::class,'visharadaprathamshow']);
Route::post('/admin/visharad-pratham',[AdminController::class,'store']);


Route::get('/admin/{student}',[AdminController::class,'detail'])->name('admin.detail');
Route::get('/admin/{student}/edit',[AdminController::class,'editstudent']);
Route::get('/admin/{student}/delete',[AdminController::class,'destroy']);
Route::get('/editsyllabus/{id}', [AdminController::class,'edit']);
Route::put('/updateLink/{id}',[AdminController::class,'updateLink']);
Route::post('/admin/{student}/update-student', [AdminController::class, 'updateStudent'])->name('admin.update');
Route::patch('/admin/update-student-status/{student}', [AdminController::class, 'updateStudentStatus'])
    ->name('updateStudentStatus');

Route::get('/reuse', function () {
  return view ('admin.reuse');
});

Route::get('/vedu', function () {
    return 'hello';
});

Route::get('/sources', function () {
     return view ('admin.sources');
});


Route::post('/sources', [ResourcesController::class, 'storeresources']);
Route::get('/editsources/{id}', [ResourcesController::class,'editsources']);
Route::put('/updatesourcesLink/{id}',[ResourcesController::class,'updateLinksources']);
Route::get('/sources/prarmbhik',[ResourcesController::class,'showprarmbhiksource']);
Route::post('/sources/prarmbhik',[ResourcesController::class,'store']);
Route::get('/sources/praveshika-pratham',[ResourcesController::class,'prathamshowsource']);
Route::post('/sources/praveshika-pratham',[ResourcesController::class,'store']);
Route::get('/sources/praveshika-purna',[ResourcesController::class,'praveshikashowsource']);
Route::post('/sources/praveshika-purna',[ResourcesController::class,'store']);
Route::get('/sources/madhyama-pratham',[ResourcesController::class,'madhyamashowsource']);
Route::post('/sources/madhyama-pratham',[ResourcesController::class,'store']);

Route::get('/sources/madhyama-purna',[ResourcesController::class,'madhyamapurnashowsource']);
Route::post('/sources/madhyama-purna',[ResourcesController::class,'store']);



Route::get('/sources/visharad-purna',[ResourcesController::class,'visharadpurnashowresource']);
Route::post('/sources/visharad-purna',[ResourcesController::class,'store']);

Route::get('/sources/visharad-pratham',[ResourcesController::class,'visharadaprathamshowsource']);
Route::post('/sources/visharad-pratham',[ResourcesController::class,'store']);


Route::get('/questionpapers', function () {
  return view ('admin.questionpapers');
});

Route::post('/questionpapers', [QuestionPaperController::class, 'storequestion']);
Route::get('/editquestion/{id}', [QuestionPaperController::class,'editsquestion']);
Route::put('/updatelinkquestion/{id}',[QuestionPaperController::class,'updatelinkquestion']);

 Route::get('/questionpapers/prarmbhik',[QuestionPaperController::class,'showprarmbhikquestion']);
Route::post('/questionpapers/prarmbhik',[QuestionPaperController::class,'store']);
Route::get('/questionpapers/praveshika-pratham',[QuestionPaperController::class,'prathamshowquestion']);
Route::post('/questionpapers/praveshika-pratham',[QuestionPaperController::class,'store']);
Route::get('/questionpapers/praveshika-purna',[QuestionPaperController::class,'praveshikashowquestion']);
Route::post('/questionpapers/praveshika-purna',[QuestionPaperController::class,'store']);
Route::get('/questionpapers/madhyama-pratham',[QuestionPaperController::class,'madhyamashowquestion']);
Route::post('/questionpapers/madhyama-pratham',[QuestionPaperController::class,'store']);

Route::get('/questionpapers/madhyama-purna',[QuestionPaperController::class,'madhyamapurnashowquestion']);
Route::post('/questionpapers/madhyama-purna',[QuestionPaperController::class,'store']);



Route::get('/questionpapers/visharad-purna',[QuestionPaperController::class,'visharadpurnashowquestion']);
Route::post('/questionpapers/visharad-purna',[QuestionPaperController::class,'store']);

Route::get('/questionpapers/visharad-pratham',[QuestionPaperController::class,'visharadaprathamshowquestion']);
Route::post('/questionpapers/visharad-pratham',[QuestionPaperController::class,'store']);

Route::get('/viewpdf/{id}',[AdminController::class,'viewpdf']);
Route::get('/viewsourcepdf/{id}',[ResourcesController::class,'viewsourcespdf']);

Route::get('/viewquestionspdf/{id}',[QuestionPaperController::class,'viewquestionspdf']);
Route::get('/downloadquestions/{id}',[QuestionPaperController::class,'downloadquestions']);

Route::get('/downloadsroucesfile/{file}', [ResourcesController::class,'downloadresources']);
Route::get('/downloadfile/{file}', [AdminController::class,'downloadfile']);


 Route::get('/samplequestion',[AdminController::class,'samplequestion']);
 Route::get('/downloadfile/{file}', [AdminController::class,'downloadfile']);

 //Route::get('/batches/createbatch',[BatchController::class,'index']);

 Route::get('/batches/createbatch', [BatchController::class, 'index'])->name('batches.createbatch');
 Route::post('/batches/store', [BatchController::class, 'store'])->name('batches.store');
 Route::put('/batches/{batch}', [BatchController::class, 'update'])->name('batches.update');
Route::get('/batches/showbatches', [BatchController::class, 'show'])->name('batches.show');
Route::get('/batches/{batch}/editbatch', [BatchController::class, 'edit'])->name('batches.edit');
Route::get('/batches/{batch}/delete', 'BatchController@destroy')->name('batches.destroy');


Route::get('/branches/createbranch', [BranchController::class, 'index'])->name('branches.createbranch');
 Route::post('/branches/store', [BranchController::class, 'store'])->name('branches.store');
 Route::put('/branches/{branch}', [BranchController::class, 'update'])->name('branches.update');
Route::get('/branches/showbranches', [BranchController::class, 'show'])->name('branches.show');
Route::get('/branches/{branch}/editbranch', [BranchController::class, 'edit'])->name('branches.edit');
Route::get('/branches/{branch}/delete', 'BranchController@destroy')->name('braches.destroy');

});

Route::group(['middleware'=>['web','checkStudent','verified','auth']],function(){
  Route::get('/dashboard',[AuthController::class,'loadDashboard']);

  Route::get('/student/profile', [StudentController::class, 'profile'])->name('student.profile');

   
  Route::get('/studentinfo',[StudentController::class,'showstudnetinfo'])->name('student.showstudentinfo');
  Route::get('/student/{student}/edit',[StudentController::class,'editstudentdetail']);
  Route::post('/student/{student}/update-studentinfo', [StudentController::class, 'updateStudentinfo'])->name('student.update');

  Route::get('/student/syllabus',[StudentController::class,'studentsyllabus']);
  Route::get('/student/prarmbhik',[SyllabusController::class,'showprarmbhik']);
  Route::post('/student/prarmbhik',[SyllabusController::class,'store']);
  Route::get('/student/praveshika-pratham',[SyllabusController::class,'prathamshow']);
Route::post('/student/praveshika-pratham',[SyllabusController::class,'store']);
Route::get('/student/praveshika-purna',[SyllabusController::class,'praveshikashow']);
Route::post('/student/praveshika-purna',[SyllabusController::class,'store']);
Route::get('/student/madhyama-pratham',[SyllabusController::class,'madhyamashow']);
Route::post('/student/madhyama-pratham',[SyllabusController::class,'store']);

Route::get('/student/madhyama-purna',[SyllabusController::class,'madhyamapurnashow']);
Route::post('/student/madhyama-purna',[SyllabusController::class,'store']);

Route::get('/student/visharad-pratham',[SyllabusController::class,'visharadshow']);
Route::post('/student/visharad-pratham',[SyllabusController::class,'store']);

Route::get('/student/visharad-purna',[SyllabusController::class,'visharadpurnashow']);
Route::post('/student/visharad-purna',[SyllabusController::class,'store']);
Route::get('/download/{file}',[SyllabusController::class,'download']);
Route::get('/view/{id}',[SyllabusController::class,'view']);
Route::get('/student/test',[SyllabusController::class,'test']);
//Route::get('/student/test',[SyllabusController::class,'test'])->name('test');


Route::get('/student-sources/prarmbhik', [StudentController::class, 'prarmbhiksource']);
Route::get('/student-sources/praveshika-pratham', [StudentController::class, 'prathamsource']);
Route::get('/student-sources/praveshika-purna', [StudentController::class, 'praveshikasource']);

Route::get('/student-sources/madhyama-pratham',[StudentController::class,'madhyamasource']);

Route::get('/student-sources/madhyama-purna',[StudentController::class,'madhyamapurnasource']);


Route::get('/student-sources/visharad-purna',[StudentController::class,'visharadpurnasource']);

Route::get('/student-sources/visharad-pratham',[StudentController::class,'visharadaprathamsource']);




Route::get('/student-questions/prarmbhik', [StudentController::class, 'prarmbhikquestion']);
Route::get('/student-questions/praveshika-pratham', [StudentController::class, 'prathamquestion']);
Route::get('/student-questions/praveshika-purna', [StudentController::class, 'praveshikaquestion']);

Route::get('/student-questions/madhyama-pratham',[StudentController::class,'madhyamaquestion']);

Route::get('/student-questions/madhyama-purna',[StudentController::class,'madhyamapurnaquestion']);


Route::get('/student-questions/visharad-purna',[StudentController::class,'visharadpurnaquestion']);

Route::get('/student-questions/visharad-pratham',[StudentController::class,'visharadaprathamquestion']);


Route::get('/studentsourcepdf/{id}',[StudentController::class,'viewstudentsourcepdf']);
Route::get('/download/{id}',[StudentController::class,'download']);
Route::get('/studentquestionspdf/{id}',[StudentController::class,'viewstudentquestionpdf']);

});

Route::get('/verified', function () {
    return view('auth.verified');
});
//Auth::routes(['verify' => true]);
Route::get('/email/verify/{id}/{hash}', [VerificationController::class,'verify'])->name('verification.verify');
Auth::routes();
Route::get('/email/verify', [VerificationController::class,'show'])->name('verification.notice');

Route::get('/email/resend', [VerificationController::class,'resend'])->name('verification.resend');
//Auth::routes(['verify' => true]);
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'verified'])->group(function () {
    // Admin Dashboard
    Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard']);
     
    // User Dashboard
    Route::get('/dashboard', [AuthController::class, 'loadDashboard']);
});