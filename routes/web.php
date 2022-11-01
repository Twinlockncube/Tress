<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth\login');
    //return view('welcome');
});
Route::get('/register', function () {
    return view('auth\register');
});
Route::get('/assessment', function () {
    return view('assessment');
})->name('assessment');

Route::get('/trial', function () {
    return view('trial');
})->name('trial');

Route::get('/registration', function () {
    return view('registration');
})->name('regist');

Route::get('/guardian', function () {
    return view('guardian');
})->name('guardian');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    //Route::resource('products', ProductController::class);
    Route::post('/reg_student',[App\Http\Controllers\StudentController::class, 'index'])->name('reg_student');
    Route::post('/update_student',[App\Http\Controllers\StudentController::class, 'updateStudent'])->name('update_student');
    Route::get('/view_student',[App\Http\Controllers\StudentController::class, 'viewStudent'])->name('view_student');
    Route::get('/delete_student',[App\Http\Controllers\StudentController::class, 'deleteStudent'])->name('delete_student');
    Route::get('students/list', [App\Http\Controllers\StudentController::class, 'getStudents'])->name('students.list');
    //Subject Routes
    Route::get('subject/existence', [App\Http\Controllers\SubjectController::class, 'existence'])->name('subjects.existence');


    //Assessment Routes
    Route::get('assessment/index', [App\Http\Controllers\AssessmentController::class, 'index'])->name('assessment.index');
    Route::get('assessment/list', [App\Http\Controllers\AssessmentController::class, 'getAssessments'])->name('assessment.list');
    Route::get('assessment/subject', [App\Http\Controllers\AssessmentController::class, 'getSubject'])->name('assessment.subject');
    Route::post('assessment/create', [App\Http\Controllers\AssessmentController::class, 'create'])->name('assessment.create');
    Route::get('assessment/view', [App\Http\Controllers\AssessmentController::class, 'viewAssessment'])->name('assessment.view');
    Route::get('assessment/val_total', [App\Http\Controllers\AssessmentController::class, 'validateTotal'])->name('assessment.val_total');


    //Results Routes
    Route::get('result/list/{group}/{code}', [App\Http\Controllers\ResultController::class, 'getResults'])->name('result.list');
    Route::get('result/capture', [App\Http\Controllers\ResultController::class, 'index'])->name('result.capture');
    Route::get('results/view', [App\Http\Controllers\ResultController::class, 'viewAssessment'])->name('result.view');
    Route::post('result/create', [App\Http\Controllers\ResultController::class, 'create'])->name('result.create');

    //Books Routes
    Route::get('books/books', [App\Http\Controllers\BookController::class, 'index'])->name('book.index');
    Route::get('books/list', [App\Http\Controllers\BookController::class, 'getBooks'])->name('books.list');
    Route::post('books/create', [App\Http\Controllers\BookController::class, 'create'])->name('books.create');
    Route::get('books/view', [App\Http\Controllers\BookController::class, 'view'])->name('books.view');
    Route::get('books/delete', [App\Http\Controllers\BookController::class, 'delete'])->name('books.delete');
    Route::post('books/update', [App\Http\Controllers\BookController::class, 'update'])->name('books.update');

    //Copies Routes
    Route::get('copies/index', [App\Http\Controllers\CopyController::class, 'index'])->name('copies.index');
    Route::get('copies/list', [App\Http\Controllers\CopyController::class, 'list'])->name('copies.list');
    Route::get('copies/availability', [App\Http\Controllers\CopyController::class, 'availability'])->name('copies.availability');
    Route::post('copies/create', [App\Http\Controllers\CopyController::class, 'create'])->name('copies.create');
    Route::get('copies/view', [App\Http\Controllers\CopyController::class, 'view'])->name('copies.view');

    //Issues Routes
    Route::get('issues/index', [App\Http\Controllers\IssueController::class, 'index'])->name('issues.index');
    Route::get('issues/list', [App\Http\Controllers\IssueController::class, 'list'])->name('issues.list');
    Route::get('issues/view', [App\Http\Controllers\IssueController::class, 'view'])->name('issues.view');
    Route::post('issues/create', [App\Http\Controllers\IssueController::class, 'create'])->name('issues.create');
    Route::delete('issues/delete', [App\Http\Controllers\IssueController::class, 'delete'])->name('issues.delete');
    Route::post('issues/update', [App\Http\Controllers\IssueController::class, 'update'])->name('issues.update');

    //Receipt Routes
    Route::get('receipt/index', [App\Http\Controllers\ReceiptController::class, 'index'])->name('receipts.index');
    Route::get('receipt/list', [App\Http\Controllers\ReceiptController::class, 'list'])->name('receipts.list');
    Route::post('receipt/create', [App\Http\Controllers\ReceiptController::class, 'create'])->name('receipts.create');
    Route::get('receipt/view', [App\Http\Controllers\ReceiptController::class, 'view'])->name('receipts.view');
    Route::get('receipt/title', [App\Http\Controllers\ReceiptController::class, 'title'])->name('receipts.title');


    //Payment Routes
    Route::get('payment/index', [App\Http\Controllers\PaymentController::class, 'index'])->name('payment.index');
    Route::post('payment/create', [App\Http\Controllers\PaymentController::class, 'create'])->name('payment.create');
    Route::get('payment/batch_create', [App\Http\Controllers\PaymentController::class, 'batch_create'])->name('payment.batch_create');
    Route::get('expense/list', [App\Http\Controllers\PaymentController::class, 'expenseList'])->name('expense.list');
    Route::get('expense/view', [App\Http\Controllers\PaymentController::class, 'expenseView'])->name('expense.view');
    Route::post('expense/reverse', [App\Http\Controllers\PaymentController::class, 'reverseTransaction'])->name('expense.reverse');
    Route::get('payment/list', [App\Http\Controllers\PaymentController::class, 'paymentList'])->name('payment.list');
    Route::get('payment/delete_batch', [App\Http\Controllers\PaymentController::class, 'deleteBatch'])->name('payment.deleteBatch');

    //Lesson Routes
    Route::get('lesson/list', [App\Http\Controllers\LessonController::class, 'getLessons'])->name('lesson.list');
    Route::get('lesson/index', [App\Http\Controllers\LessonController::class, 'index'])->name('lesson.index');
    Route::get('lesson/view', [App\Http\Controllers\LessonController::class, 'viewLesson'])->name('lesson.view');
    Route::get('lesson/show', [App\Http\Controllers\LessonController::class, 'showLesson'])->name('lesson.show');
    Route::post('lesson/reg_lesson', [App\Http\Controllers\LessonController::class, 'create'])->name('reg_lesson');
    Route::get('lesson/delete_lesson', [App\Http\Controllers\LessonController::class, 'delete'])->name('delete_lesson');

    //Class_Lesson Routes
    Route::get('class_lesson/index', [App\Http\Controllers\ClassLessonController::class, 'index'])->name('class_lesson.index');
    Route::get('class_lesson/list', [App\Http\Controllers\ClassLessonController::class, 'showClassLesson'])->name('class_lesson.list');
    Route::post('class_lesson/create', [App\Http\Controllers\ClassLessonController::class, 'create'])->name('reg_class_lesson');
    Route::get('class_lesson/show', [App\Http\Controllers\ClassLessonController::class, 'show'])->name('class_lesson.show');
    Route::post('class_lesson/update', [App\Http\Controllers\ClassLessonController::class, 'update'])->name('update_class_lesson');
    Route::get('delete_class_lesson', [App\Http\Controllers\ClassLessonController::class, 'delete'])->name('delete_class_lesson');
    //Attendance Routes
    Route::get('attendance/create', [App\Http\Controllers\AttendanceController::class, 'index'])->name('attendance.create');
    Route::get('attendance/list/{group?}/{code?}', [App\Http\Controllers\AttendanceController::class, 'getAttendances'])->name('attendance.list');
    Route::post('attendance/capture', [App\Http\Controllers\AttendanceController::class, 'capture'])->name('attendance.capture');


    //Test Controllers
    Route::get('mydata/{group}/{code}', [App\Http\Controllers\TestController::class, 'theTest']);
    //Guardian Routes
    Route::get('guardians/list', [App\Http\Controllers\GuardianController::class, 'getGuardians'])->name('guardians/list');
    Route::get('/delete_guardian',[App\Http\Controllers\GuardianController::class, 'deleteGuardian'])->name('delete_guardian');
    Route::get('/view_guardian',[App\Http\Controllers\GuardianController::class, 'viewGuardian'])->name('view_guardian');
  });
