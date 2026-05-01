    <?php

    use App\Http\Controllers\ProductController;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return redirect()->route('product.index');
    });

    // Semua route product (CRUD)
    Route::middleware(['auth'])->group(function () {
        Route::resource('product', ProductController::class);
    });

    require __DIR__.'/auth.php';    