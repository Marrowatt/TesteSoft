<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    
    public function index () {
        return view('products.index', compact('products'));
    }

    public function getProducts () {
        
        $products = Product::get();

        $produtos = array();

        foreach($products as $p) {
            array_push($produtos, [
                "id"           => $p->id,
                "produto"      => $p->produto,
                "valor"        => "R$ " . ($p->valor / 100),
                "dataCadastro" => $p->created_at->format('d/m/Y')
            ]);
        }

        return $produtos;
    }

    public function getProduct ($id) {

        $p = Product::find($id);

        return $p->toArray();
    }

    public function create (Request $request) {
        
        $this->validate($request, [
            'product.produto' => 'required|string',
            'product.valor'   => 'required|numeric'
        ]);

        Product::create([
            'produto'       => $request->product['produto'],
            'valor'         => $request->product['valor'] * 100,
            'dataCadastro'  => \Carbon\Carbon::now()
        ]);

        return true;
    }

    public function update (Request $request, $id) {

        $this->validate($request, [
            'produto' => 'required|string',
            'valor'   => 'required|numeric'
        ]);

        $produto = Product::find($id);

        $produto->update([
            'produto'       => $request->get('produto'),
            'valor'         => $request->get('valor') * 100,
        ]);

        return true;
    }

    public function delete ($id) {

        $produto = Product::find($id);

        $produto->delete();

        return true;
    }

    public function search (Request $request) {

        $products = Product::where('produto', 'like', "%{$request->params}%")->get();

        $produtos = array();

        foreach($products as $p) {
            array_push($produtos, [
                "id"           => $p->id,
                "produto"      => $p->produto,
                "valor"        => "R$ " . ($p->valor / 100),
                "dataCadastro" => $p->created_at->format('d/m/Y')
            ]);
        }

        return $produtos;
    }

}
