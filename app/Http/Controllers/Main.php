<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ExDate;
use DB,File,Response,Session;
class Main extends Controller
{
    public function __construct()
    {
        $this->get_redis();
        $this->notif();
    }
    public function set_redis(Request$req)
    {
        $days=$req->days;
        Session::put('days',$days);
        return back();
    }
    public function get_redis()
    {
      return Session::get('days');
    }
    public function notif()
    {
        $date=date("Y-m-d");
        $ex_date=mktime(0, 0, 0, date("m"), date("d")+Session::get('days'), date("Y"));
        $ex_date = date("Y-m-d",$ex_date);
        return $this->notif=DB::table('data_expired')->leftJOIN('item','data_expired.id_item','=','item.id')->select('data_expired.*','item.nama','item.foto')->whereBetween('data_expired.ex_date', array($date,$ex_date))->get();
    }
    public function index()
    {
        $data['notif']=$notif=count($this->notif());
        $data['isi']=$isi=$this->notif();
        $data['product']=$product=Product::paginate(4);
        $data['ex_date']=$ex_date=DB::table('data_expired')->leftJOIN('item','data_expired.id_item','=','item.id')->select('data_expired.*','item.foto')->OrderBy('data_expired.id','DESC')->paginate(5);
    	return view('frontend.index',$data);
    }
    public function product()
    {
        $data['notif']=$notif=count($this->notif());
        $data['isi']=$isi=$this->notif();
        $data['product']=$product=Product::paginate(6);
        return view('frontend.product',$data);
    }
    public function add_product()
    {
        $data['notif']=$notif=count($this->notif());
        $data['isi']=$isi=$this->notif();
    	return view('frontend.add_product',$data);
    }
    public function saveProduct(Request$req)
    {
        $data=[
            'nama'=>$nama=$req->nama,
        ];
        if($req->hasFile('foto')){
            $foto=$req->file('foto');
            $nama=$foto->getClientOriginalName();
            $dir=public_path().'/dist/img/';
            $new_nama=time().'_'.$nama;
            $foto->move($dir,$new_nama);
            $data['foto']=$new_nama;
        }
        Product::create($data);
        return back()->with('message','Data Berhasil Disimpan');
    }
    public function deleteProduct(Request$req)
    {
        $id=$req->id;
        $foto=DB::table('item')
        ->where('id',$id)
        ->value('foto');
        File::delete('dist/img/'.$foto);
        $product=Product::findOrFail($id)->delete();
        return back()->with('message','Data Berhasil di Delete');
    }
    public function editProduct(Request$req)
    {
        $data['notif']=$notif=count($this->notif());
        $data['isi']=$isi=$this->notif();
        $id=$req->id;
        $data['product']=$product=DB::table('item')->where('id',$id)->get();
        return view('frontend.edit_product',$data);
    }
    public function saveEdit(Request$req)
    {
        $id=$req->id;
        $data=[
            'nama'=>$nama=$req->nama,
        ];
        if($req->hasFile('foto')){
            $foto=DB::table('item')
            ->where('id',$id)
            ->value('foto');
             File::delete('dist/img/'.$foto);

            $foto=$req->file('foto');
            $nama=$foto->getClientOriginalName();
            $dir=public_path().'/dist/img/';
            $new_nama=time().'_'.$nama;
            $foto->move($dir,$new_nama);
            $data['foto']=$new_nama;
        }
        Product::find($id)->update($data);
        return back()->with('message','Data Berhasil Diedit');
    }
    public function data_expired()
    {
        $data['notif']=$notif=count($this->notif());
        $data['isi']=$isi=$this->notif();
        $data['ex_date']=$ex_date=DB::table('data_expired')->leftJOIN('item','data_expired.id_item','=','item.id')->select('data_expired.*','item.foto','item.nama')->OrderBy('data_expired.id','DESC')->paginate(6);
        return view('frontend.data_expired',$data);
    }
    public function add_data_expired()
    {
        $data['notif']=$notif=count($this->notif());
        $data['isi']=$isi=$this->notif();
        return view('frontend.add_data_expired',$data);
    }
    public function deleteDataExpired(Request$req)
    {
        $id=$req->id;
        ExDate::findOrFail($id)->delete();
        return back()->with('message','Data Berhasil di Delete');   
    }
    public function editDataExpired(Request$req)
    {
        $data['notif']=$notif=count($this->notif());
        $data['isi']=$isi=$this->notif();
        $id=$req->id;
        $data['cek']=$cek=$req->view;
        $data['cek']=$cek=$req->edit;
        $data['id']=$id;
        $data['ex_date']=$ex_date=DB::table('data_expired')->leftJOIN('item','data_expired.id_item','=','item.id')->select('data_expired.*','item.foto','item.nama')->where('data_expired.id',$id)->get();
        return view('frontend.edit_data_expired',$data);
    }
    public function saveEditExpired(Request$req)
    {
        $id=$req->id;
        $data=[
            'ex_date'=>$req->ex_date,
            'qty'=>$req->qty,
            'buy_date'=>$req->buy_date,
            'location'=>$req->location
        ];
        ExDate::find($id)->update($data);
        return redirect()->action('Main@editDataExpired', ['view' => 'view','id'=>$id] )->with('message','Data Berhasil di Edit'); 
    }
    public function ambilid()
    {
        return DB::table('data_expired')->OrderBy('id','=','DESC')->get();
    }
    public function saveAddExpired(Request$req)
    {
        $id_item=$req->id;
        $data=[
            'id_item'=>$id_item,
            'qty'=>$req->qty,
            'ex_date'=>$req->ex_date,
            'buy_date'=>$req->buy_date,
            'location'=>$req->location
        ];
        ExDate::create($data);
        return back()->with('message','Data Berhasil di Tambahkan'); 
    }
    public function autocomplete(Request$req)
    {
        $term = $req->term;
        $results = array();
        
        $queries = DB::table('item')
            ->where('nama', 'LIKE', '%'.$term.'%')
            ->get();
    
        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->nama, 'gambar'=>$query->foto];
        }
        return Response::json($results);
    }
    public function take_foto(Request$req)
    {
        $data['nama']=$nama=$req->nama;
        return view('frontend.take_foto',$data);
    }
}
