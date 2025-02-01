<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Mostrar lista de productos, con sus respectivos filtros y páginacion(10)
    public function index(Request $request)
    {
        $query = Product::query();
        /**Este filtro nos sirve para excluir de nuestra vista productos inactivos(Que son eliminados)*/
        $query->where('is_active', true);
        // Filtro por nombre
        if ($request->has('search') && $request->search) 
        {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        // Filtros por rango de precios
        if ($request->has('min_price') && $request->min_price) {
            $query->where('unit_price', '>=', $request->min_price);
        }
        if ($request->has('max_price') && $request->max_price)
        {
            $query->where('unit_price', '<=', $request->max_price);
        }
        // Filtros por cantidad en stock
        if ($request->has('min_quantity') && $request->min_quantity) {
            $query->where('current_quantity', '>=', $request->min_quantity);
        }
        if ($request->has('max_quantity') && $request->max_quantity) 
        {
            $query->where('current_quantity', '<=', $request->max_quantity);
        }
        // paginación para que nos muestren únicamente 10 productos por página
        $products = $query->paginate(10);
        return view('products.index', compact('products'));
    }
    
    //Nos muestra la vista, donde se encuentra el form para crear un producto nuevo
    public function create()
    {
        return view('products.create');
    }
    
    //nos permite almacenar un nuevo producto en la bd
    public function store(Request $request)
    {
        //El form contendrá validacions de cada dato ingresado
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'unit_price' => 'required|numeric',
            'initial_quantity' => 'required|integer',
        ]);
        //Creación de un nuevo producto
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'unit_price' => $request->unit_price,
            'initial_quantity' => $request->initial_quantity,
            'current_quantity' => $request->initial_quantity, // Por defecto, siempre será igual a la cantidad con la que se registre al inicio
        ]);
        return redirect()->route('products.index');//Nos redirige a la lista de productos, nuestra vista principal
    }
    
    // Muestra la vista donde se encuentra nuestro form, para editar un producto
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }
    
    public function update(Request $request, Product $product)
{
    $request->validate([
        'name' => 'required|max:255',
        'description' => 'nullable',
        'unit_price' => 'required|numeric',
        'initial_quantity' => 'required|integer',
    ]);

    // Calculamos la diferencia entre la cantidad inicial anterior y la nueva
    $diferencia = $request->initial_quantity - $product->getOriginal('initial_quantity');

    // Actualiza los campos básicos
    $product->update([
        'name' => $request->name,
        'description' => $request->description,
        'unit_price' => $request->unit_price,
        'initial_quantity' => $request->initial_quantity,
        'current_quantity' => $product->current_quantity + $diferencia, // Ajusta la cantidad actual
    ]);

    return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente.');
}

    
    /**La función destroy en este caso, no va a eliminar un producto directamente también de la base de datos
     * sino que, solamente al eliminar un producto este se pondrá en estado inactivo(0) en nuestra bd y con el filtro 
     * que anteriormente aparece en nuestro index, nos permitira que el producto se borre de la vista, pero en nuestra bd se mantenga
     * almacenado, para evitar cualquir inconveniente, o que se haya borra un x producto por error
     */ 
    public function destroy(Product $product)
    {
        // Cambiar el estado del producto a inactivo
        $product->is_active = false;
        $product->save();
        // Redirigir con un mensaje de éxito
        return redirect()->route('products.index')->with('success', 'Producto Eliminado correctamente.');
    }
    
    //Actualiza el inventario de un producto, si un producto sale o entra al stock
    public function updateInventory(Request $request, Product $product)
    {
        $request->validate
        ([
            'quantity' => 'required|integer|min:1', // La cantidad debe ser un número positivo
            'type' => 'required|in:entrada,salida', // Asegura que el tipo sea "entrada" o "salida"
        ]);
        
        // Verifica si la cantidad en salida es mayor que el stock disponible
        if ($request->type == 'salida' && $product->current_quantity < $request->quantity) 
        {
            return redirect()->back()->with('error', 'No hay suficiente stock disponible.');
        }
        
        // Actualiza la cantidad en el inventario
        if ($request->type == 'entrada') 
        {
            $product->current_quantity += $request->quantity;
        }
        else
        {
            $product->current_quantity -= $request->quantity;
        }
        $product->save();
        return redirect()->route('products.index')->with('success', 'Inventario actualizado correctamente.');
    }
    
    //Muestra los detalles de un producto seleccionado en específico
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
