<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Si el usuario no está autenticado, lo manda al login
Route::get('/', function () {
    return redirect()->route('login');
});

// Rutas protegidas por el middleware 'auth'
//sí el usuario no esta autenticado no podra ingresar a estas rutas
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('products.index'); // Redirección al listado de pruductos
    })->name('dashboard');

    //Gestión de productos
    Route::resource('products', ProductController::class);//crea rutas restful para el crud de productos
    Route::post('products/{product}/inventory', [ProductController::class, 'updateInventory'])->name('products.updateInventory');//Actualiza el inventario de un producto seleccionado
    Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');//Muestra detalles de un producto seleccionado
});

//rutas de autenticación generadas por Breeze
require __DIR__.'/auth.php';
