<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|sstme
*/

Route::get('/', function () {
    return view('auth.login');
});


 // Route::get('/dashboard', function () {
 //   //return view('dashboard');
 // })->middleware(['auth', 'verified'])->name('dashboard');

 // Route::middleware('auth')->group(function () {

 //     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
 //     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
 //     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
 // });




Route::middleware(['auth','role:admin'])->group(function () {
    //Dashboard
Route::get('admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
Route::post('admin/productsearc', [App\Http\Controllers\AdminController::class, 'loadproductsearch'])->name('loadproduc');
Route::post('admin/insert_sale', [App\Http\Controllers\AdminController::class, 'insert_sale'])->name('insert_sales');
Route::post('admin/customerload', [App\Http\Controllers\AdminController::class, 'loadcustomer'])->name('customerloa');

    //Employee
Route::get('admin/employee', [App\Http\Controllers\EmployeeController::class, 'show'])->name('employee.show');
Route::post('admin/employee', [App\Http\Controllers\EmployeeController::class, 'employeefor'])->name('add.employee');
Route::get('admin/fetchemployee', [App\Http\Controllers\EmployeeController::class, 'fetchall'])->name('fetchall.employee');
Route::get('admin/editemployee', [App\Http\Controllers\EmployeeController::class, 'editEmployee'])->name('edit.employee');
Route::post('admin/updateemployee', [App\Http\Controllers\EmployeeController::class, 'updateEmployee'])->name('update.employee');
Route::post('admin/deleteemployee', [App\Http\Controllers\EmployeeController::class, 'deleteEmployee'])->name('delete.employee');


//Customer line of view
Route::get('admin/customer', [App\Http\Controllers\CustomerController::class, 'displyCustomer'])->name('show.customer');
Route::post('admin/customer', [App\Http\Controllers\CustomerController::class, 'customerform'])->name('add.customer');
Route::get('admin/fetchcustomer', [App\Http\Controllers\CustomerController::class, 'fetchallcustomer'])->name('fetchall.customer');
Route::get('admin/editcustomer', [App\Http\Controllers\CustomerController::class, 'editCustomer'])->name('edit.customer');
Route::post('admin/updatecustomer', [App\Http\Controllers\CustomerController::class, 'updateCustomer'])->name('update.customer');
Route::post('admin/deletecustomer', [App\Http\Controllers\CustomerController::class, 'deleteCustomer'])->name('delete.customer');



//Supplier line of view
Route::get('admin/supplier', [App\Http\Controllers\SupplierController::class, 'displySupplier'])->name('show.Supplier');
Route::post('admin/supplier', [App\Http\Controllers\SupplierController::class, 'supplierform'])->name('add.supplier');
Route::get('admin/fetchsupplier', [App\Http\Controllers\SupplierController::class, 'fetchallsupplier'])->name('fetchall.supplier');
Route::get('admin/editsupplier', [App\Http\Controllers\SupplierController::class, 'editSupplier'])->name('edit.supplier');
Route::post('admin/updatesupplier', [App\Http\Controllers\SupplierController::class, 'updateSupplier'])->name('update.supplier');
Route::post('admin/deletesupplier', [App\Http\Controllers\SupplierController::class, 'deleteSupplier'])->name('delete.supplier');

//Supplierdeliver line of view
Route::get('admin/supplierdeliverlist', [App\Http\Controllers\SupplierController::class, 'deliverSupplier'])->name('show.Supplierdeliver');

Route::get('admin/fetchsupplierliverlist', [App\Http\Controllers\SupplierController::class, 'fetchallsupplierliver'])->name('fetchall.supplierlivery');

Route::post('admin/supplierdeliver', [App\Http\Controllers\SupplierController::class, 'supplierliveryform'])->name('add.supplierlivery');

Route::get('admin/supplierpayment', [App\Http\Controllers\SupplierController::class, 'displyPayment'])->name('show.payment');

Route::post('admin/supplierpayments', [App\Http\Controllers\SupplierController::class, 'paymentform'])->name('add.payments'
);

Route::get('admin/fetchPayment', [App\Http\Controllers\SupplierController::class, 'fetchallPayment'])->name('fetchall.supplierallPayment');

Route::get('admin/editpayments', [App\Http\Controllers\SupplierController::class, 'edittotalpayment'])->name('edit.paymentOrder');
    
Route::post('admin/deletePaymentOrder', [App\Http\Controllers\SupplierController::class, 'deletePaymentorde'])->name('delete.paymentOrder');



//warehouse line of view
Route::get('admin/warehouse', [App\Http\Controllers\WarehouseController::class, 'displyWarehouse'])->name('show.warehouse');

Route::post('admin/addwarehouse', [App\Http\Controllers\WarehouseController::class, 'warehouseform'])->name('add.warehouse');
Route::get('admin/fetchwarehouse', [App\Http\Controllers\WarehouseController::class, 'fetchallwarehouse'])->name('fetchall.warehouse');


Route::get('admin/edit_Warehouse', [App\Http\Controllers\WarehouseController::class, 'editwarehouse'])->name('edit.warehouse');

Route::post('admin/updatewarehouses', [App\Http\Controllers\WarehouseController::class, 'updatewarehou'])->name('update.warehouse');

//warehouse new load

Route::get('admin/warehousenewload', [App\Http\Controllers\WarehouseController::class, 'warehousenewload'])->name('show.warehousenewload');

Route::get('admin/fetchwarehousenewload', [App\Http\Controllers\WarehouseController::class, 'fetchwarehousenewload'])->name('fetch.warehousenewload');

Route::post('admin/warehousenewupdate', [App\Http\Controllers\WarehouseController::class, 'warehousenewupdate'])->name('update.warehousenewinsert');

Route::get('admin/warehouseupdateload', [App\Http\Controllers\WarehouseController::class, 'show_warehouseupdateloadnew'])->name('show.warehouseupdateloadnew');

Route::get('admin/fetch_warehouseupdateloadnew', [App\Http\Controllers\WarehouseController::class, 'fetch_warehouseupdateloadnew'])->name('fetchall.warehouseupdateloadnew');

Route::post('admin/search_warehouseupdateloadnew', [App\Http\Controllers\WarehouseController::class, 'warehouseupdateloadnewsearch'])->name('search_warehouses');

Route::post('admin/delete_warehouseupdateloadnew', [App\Http\Controllers\WarehouseController::class, 'delet_warehouseupdateloadnew'])->name('delete.warehouseupdateloadnew');







//marks stock
Route::get('admin/product', [App\Http\Controllers\ProductsController::class, 'displyProduct'])->name('show.product');

Route::get('admin/product_form', [App\Http\Controllers\ProductFormController::class, 'productForm'])->name('form.product');

Route::get('admin/productform', [App\Http\Controllers\ProductFormController::class, 'fetchalProductForm'])->name('fetchform.product');

Route::post('admin/productforminsert', [App\Http\Controllers\ProductFormController::class, 'productforminsert'])->name('insertform.product');

Route::get('admin/fetchstock', [App\Http\Controllers\ProductsController::class, 'stockfetch'])->name('stock.fetch');


Route::post('admin/stockediting', [App\Http\Controllers\ProductsController::class, 'productedits'])->name('edits.products');


Route::post('admin/deletestock', [App\Http\Controllers\ProductsController::class, 'delet_prods'])->name('deletes.stock');


//newstock show
Route::get('admin/newstock', [App\Http\Controllers\ProductFormController::class, 'shownewstock'])->name('show.newstock');



Route::get('admin/fetchnewstock', [App\Http\Controllers\ProductFormController::class, 'fetch_newstock'])->name('fetch.newstock');

Route::post('admin/search_newstock', [App\Http\Controllers\ProductFormController::class, 'search_newstocks'])->name('search.newstock');



Route::post('admin/delete_newstock', [App\Http\Controllers\ProductFormController::class, 'delet_newstock'])->name('delete.newstock');


//product Statis
Route::get('admin/show_product', [App\Http\Controllers\ProductsController::class, 'showproductstat'])->name('show.productstatis');


Route::get('admin/fetch_productsta', [App\Http\Controllers\ProductsController::class, 'fetch_productstat'])->name('fetch.productstat');

Route::post('admin/search_productsta/{id}', [App\Http\Controllers\ProductsController::class, 'fetchsearch_productstat'])->name('search.productstat');





//sale statistis 

Route::get('admin/show_salestatistic', [App\Http\Controllers\SaleController::class, 'show_salestatistic'])->name('show.salestatistic');



Route::get('admin/fetch_statistics', [App\Http\Controllers\SaleController::class, 'fetchallsalestatistics'])->name('fetchs.statistics');


Route::post('admin/search_salestatis', [App\Http\Controllers\SaleController::class, 'search_salestatistics'])->name('search.productstat');

//customer statistics
Route::get('admin/show_customerstatistic', [App\Http\Controllers\SaleController::class, 'show_cutomerstatistic'])->name('show.customerstatistic');


Route::get('admin/fetch_customerstatistics', [App\Http\Controllers\SaleController::class, 'fetchallcustomerstatistics'])->name('fetchs.customerstatistics');


Route::post('admin/search_customerstatistics', [App\Http\Controllers\SaleController::class, 'searchcustomerstatistics'])->name('search.customertstat');

//Details customer
Route::get('admin/show_customerdetails', [App\Http\Controllers\SaleController::class, 'show_customerdetails'])->name('show.customerdetails');

Route::get('admin/fetch_customerdetail', [App\Http\Controllers\SaleController::class, 'fetch_customerdetails'])->name('fetc_customerdetails');


//Reciept printing information

Route::get('admin/view_customer', [App\Http\Controllers\SaleController::class, 'view_customers'])->name('view_custome');


Route::get('admin/print_customer', [App\Http\Controllers\SaleController::class, 'print_customers'])->name('print_custome');



//User information
Route::get('admin/show_newuser', [App\Http\Controllers\newuserControler::class, 'shownewuser'])->name('show.newuser');


Route::get('admin/fetch_newusers', [App\Http\Controllers\newuserControler::class, 'fetch_newuser'])->name('fetchnewuser');

Route::get('admin/editnewuser', [App\Http\Controllers\newuserControler::class, 'editnewuser'])->name('edit_newuser');


Route::post('admin/update_newusers', [App\Http\Controllers\newuserControler::class, 'updateNewuser'])->name('update_newuser');




Route::post('admin/delete_newusers', [App\Http\Controllers\newuserControler::class, 'deleteNewuser'])->name('deletes_newusers');

/*Route::get('registers', [App\Http\Controllers\Auth\newuserControler::class, 'registers'])
                ->name('registers');*/

Route::get('registers', [App\Http\Controllers\Auth\RegisteredUserController::class, 'create'])->name('regist');


Route::post('new_register', [App\Http\Controllers\Auth\RegisteredUserController::class, 'store'])->name('new_regist');










    //logout
Route::post('/', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logouts');


});


Route::middleware(['auth','role:customer'])->group(function () {
   // Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
   // Route::get('customer/dashboard', [CustomerController::class, 'dashboard'])->name('dashboard');

    });



 Route::get('/login', [App\Http\Controllers\adminsController::class, 'Index'])->name('login_form');

//Route::post('/login/owner', [App\Http\Controllers\adminsController::class, 'Login'])->name('admin.login');

//Route::get('/dashboard', [App\Http\Controllers\adminsController::class, 'Dashboard'])->name('admin.dashboard');

//Route::get('/logout', [App\Http\Controllers\AdminController::class, 'AdminLogout'])->name('admin.logout');


//temp

Route::prefix('/pos')->group(function (){
    //GET
Route::get('/', [HomeController::class, 'home'])->name('pos.home');


//Supplier line of view
//Route::get('/supplier', [App\Http\Controllers\SupplierController::class, 'displySupplier'])->name('show.Supplier');
// Route::post('/supplier', [App\Http\Controllers\SupplierController::class, 'supplierform'])->name('add.supplier');
// Route::get('/fetchsupplier', [App\Http\Controllers\SupplierController::class, 'fetchallsupplier'])->name('fetchall.supplier');
// Route::get('/editsupplier', [App\Http\Controllers\SupplierController::class, 'editSupplier'])->name('edit.supplier');
// Route::post('/updatesupplier', [App\Http\Controllers\SupplierController::class, 'updateSupplier'])->name('update.supplier');
// Route::post('/deletesupplier', [App\Http\Controllers\SupplierController::class, 'deleteSupplier'])->name('delete.supplier');


//Warehouse line of view
// Route::get('/warehouse', [App\Http\Controllers\WarehouseController::class, 'displyWarehouse'])->name('show.warehouse');
// Route::post('/warehouse', [App\Http\Controllers\WarehouseController::class, 'warehouseform'])->name('add.warehouse');
// Route::get('/fetchwarehouse', [App\Http\Controllers\WarehouseController::class, 'fetchallwarehouse'])->name('fetchall.warehouse');


//Product line of view
// Route::get('/product', [App\Http\Controllers\ProductsController::class, 'displyProduct'])->name('show.product');





// Route::get('/product_form', [App\Http\Controllers\ProductFormController::class, 'productForm'])->name('form.product');
// //fetchalProductForm

// Route::get('/productform', [App\Http\Controllers\ProductFormController::class, 'fetchalProductForm'])->name('fetchform.product');

// Route::post('/productforminsert', [App\Http\Controllers\ProductFormController::class, 'productforminsert'])->name('insertform.product');

});







    require __DIR__.'/auth.php';
