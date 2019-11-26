package com.example.aplikasi;

import android.app.Dialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.Spinner;
import android.widget.Toast;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

public class List extends AppCompatActivity {
    ListView listView;
    SimpleAdapter adapter;
    HashMap<String, String> map;
    ArrayList<HashMap<String, String>> mylist;
    String[] text;
    private Spinner spNamen;
    private String[] germanFeminine = { "-- Pilih Filter --", "Sampai Kantor Cabang", "Di Bawa", "Di Kirim", "Sampai Penerima", "Diterima"};
    String url;
    String hosts;
    SharedPreferences pref;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list);

        hosts = new Server().getUrl();

        listView = (ListView)findViewById(R.id.list_view);
        spNamen = (Spinner) findViewById(R.id.spinner2);

        Button btnfilter = (Button)findViewById(R.id.button4);
        Button logout = (Button) findViewById(R.id.logout);

        pref = getApplicationContext().getSharedPreferences("mypref", 0);

        final ArrayAdapter<String> adapter = new ArrayAdapter<>(this,
                android.R.layout.simple_spinner_dropdown_item, germanFeminine);
        spNamen.setAdapter(adapter);
        url = hosts+"/tugasakhirku/public/api/notakirim";

        load();

        listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                Map<String, Object> map = (Map<String, Object>)parent.getItemAtPosition(position);
                final String code = (String) map.get("id");
                final String status = (String) map.get("status");

                Log.e("status : ", String.valueOf(status));

                String[] Options = new String[]{};

                if (status.equals("3")) {
                    Options = new String[]{"Bawa"};
                }else if(status.equals("4")){
                    Options = new String[]{"Kirim Ke Alamat"};
                }else if(status.equals("5")){
                    Options = new String[]{"Track Lokasi", "Sampai"};
                }else if(status.equals("6")){
                    Options = new String[]{"Konfirmasi Terima"};
                }

                AlertDialog.Builder builder = new AlertDialog.Builder(List.this);
                builder.setTitle("Pilih Opsi");
                builder.setItems(Options, new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        Log.e("cek", String.valueOf(code));

                        if (status.equals("3")){
                            Bawa(Integer.valueOf(code));
                        }else if (status.equals("4")){
                            Kirim(Integer.valueOf(code));
                        }else if (status.equals("5")){
                            if (which==0){
                                getMaps(code);
                            }else{
                                Sampai(Integer.valueOf(code));
                            }
                        }else if (status.equals("6")){
                            Konfirmasi(Integer.valueOf(code));
                        }
                    }
                });

                builder.show();
                load();

            }
        });

        logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(List.this, "Anda Logout, Terimakasih ", Toast.LENGTH_SHORT).show();
                pref.edit().clear().commit();
                Intent i = new Intent(List.this, MainActivity.class);
                startActivity(i);
                finish();
            }
        });

        spNamen.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> adapterView, View view, int i, long l) {
                String indent = String.valueOf(i);
                int baru = 0;
                if (indent.equals("1")){
                    baru = 3;
                }else if(indent.equals("2")){
                    baru = 4;
                }else if(indent.equals("3")){
                    baru = 5;
                }else if(indent.equals("4")){
                    baru = 6;
                }else if(indent.equals("5")){
                    baru = 7;
                }

                url = hosts+"/tugasakhirku/public/api/notakirim/"+baru;
            }

            @Override
            public void onNothingSelected(AdapterView<?> adapterView) {

            }
        });

        btnfilter.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Log.e("title", String.valueOf(url));
                load();
            }
        });
    }

    private void Bawa(int which){
        String url = hosts+"/tugasakhirku/public/api/bawa/"+which+"/"+pref.getString("id", null);
        StringRequest postRequest = new StringRequest(Request.Method.GET, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonObj = new JSONObject(response);

                            Log.e("Barang Dibawa : ", String.valueOf(jsonObj));
                            setList();
                        } catch (JSONException e) {
                            e.printStackTrace();
                            Log.e("title", String.valueOf(e.getMessage()));
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Log.e("title", String.valueOf(error.getMessage()));
                    }
                });
        //Creating a request queue
        RequestQueue requestQueue = Volley.newRequestQueue(this);

        //Adding request to the queue
        requestQueue.add(postRequest);
    }

    private void Kirim(int which){
        String url = hosts+"/tugasakhirku/public/api/kirim/"+which;
        StringRequest postRequest = new StringRequest(Request.Method.GET, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonObj = new JSONObject(response);

                            Log.e("Barang Dikirim : ", String.valueOf(jsonObj));
                            setList();
                        } catch (JSONException e) {
                            e.printStackTrace();
                            Log.e("title", String.valueOf(e.getMessage()));
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Log.e("title", String.valueOf(error.getMessage()));
                    }
                });
        //Creating a request queue
        RequestQueue requestQueue = Volley.newRequestQueue(this);

        //Adding request to the queue
        requestQueue.add(postRequest);
    }

    private void Sampai(int which){
        String url = hosts+"/tugasakhirku/public/api/sampai/"+which;
        StringRequest postRequest = new StringRequest(Request.Method.GET, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonObj = new JSONObject(response);

                            Log.e("Barang Telah Sampai : ", String.valueOf(jsonObj));
                            setList();
                        } catch (JSONException e) {
                            e.printStackTrace();
                            Log.e("title", String.valueOf(e.getMessage()));
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Log.e("title", String.valueOf(error.getMessage()));
                    }
                });
        //Creating a request queue
        RequestQueue requestQueue = Volley.newRequestQueue(this);

        //Adding request to the queue
        requestQueue.add(postRequest);
    }

    private void Konfirmasi(final int which){
        final Dialog dialog = new Dialog(List.this);
        dialog.setContentView(R.layout.custome);

        Button dialogButton = (Button) dialog.findViewById(R.id.button5);
        final EditText ed = (EditText)dialog.findViewById(R.id.textconfirm);
        dialogButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String nama = String.valueOf(ed.getText());
                String url = hosts+"/tugasakhirku/public/api/konfirmasi/"+which+"/"+nama;

                if(nama.equals("") || nama.equals(null)){
                    Toast.makeText(List.this, "Nama Penerima Harus Di isi ", Toast.LENGTH_SHORT).show();
                }else{
                    confirm(url, nama);
                    Toast.makeText(List.this, "Paket Telah Diterima ", Toast.LENGTH_SHORT).show();
                }
                dialog.dismiss();
            }
        });
        dialog.show();
    }

    private void confirm(String url, String nama){
        StringRequest postRequest = new StringRequest(Request.Method.GET, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonObj = new JSONObject(response);

                            Log.e("Barang Dikonfrimasi : ", String.valueOf(jsonObj));
                            setList();
                        } catch (JSONException e) {
                            e.printStackTrace();
                            Log.e("title", String.valueOf(e.getMessage()));
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Log.e("title", String.valueOf(error.getMessage()));
                    }
                });
        //Creating a request queue
        RequestQueue requestQueue = Volley.newRequestQueue(this);

        //Adding request to the queue
        requestQueue.add(postRequest);
    }

    private void load() {
        StringRequest postRequest = new StringRequest(Request.Method.GET, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonObj = new JSONObject(response);
                            // Getting JSON Array node
                            JSONArray events = jsonObj.getJSONArray("data");
                            Log.e("response array : ", String.valueOf(events));
                            mylist = new ArrayList<HashMap<String, String>>();
                            // looping through All Contacts
                            for (int i = 0; i < events.length(); i++) {
                                JSONObject c = events.getJSONObject(i);

                                String id = c.getString("id");
                                String no_resi = c.getString("no_resi");
                                String namapenerima = c.getString("namapenerima");
                                String tanggal = c.getString("tanggal");
                                String tlppenerima = c.getString("tlppenerima");
                                String alamatpenerima = c.getString("alamatpenerima");
                                String waktu = c.getString("waktu");
                                int status = Integer.parseInt(c.getString("status"));

                                HashMap<String, String> event = new HashMap<>();
                                // add map
                                event.put("id", id);
                                event.put("no_resi", id+". No Resi : "+no_resi);
                                event.put("tanggal", "Tanggal Kirim : "+tanggal);
                                event.put("namapenerima", "Penerima : "+namapenerima);
                                event.put("tlppenerima", "Telp : "+tlppenerima);
                                event.put("status", String.valueOf(status));
                                event.put("waktu", "Estimasi :"+String.valueOf(waktu));
                                event.put("alamatpenerima", "Alamat Penerima : "+alamatpenerima);

                                if (status==1){
                                    event.put("statusku", "Status : Paket Masuk");
                                }else if(status==2){
                                    event.put("statusku", "Status :  Dikirim Ke Kantor Cabang");
                                }else if(status==3){
                                    event.put("statusku", "Status : Sampai Ke Kantor Cabang");
                                }else if(status==4){
                                    event.put("statusku", "Status : Dibawa Kurir");
                                }else if(status==5){
                                    event.put("statusku", "Status : Menuju Ke Alamat Penerima");
                                }else if(status==6){
                                    event.put("statusku", "Status :  Paket Sampai");
                                }else{
                                    event.put("statusku", "Status : Konfirmasi Paket");
                                }

                                mylist.add(event);

                            }

                            Log.e("maplist : ", String.valueOf(mylist));
                            Log.e("jumlah : ", String.valueOf(mylist.size()));

                            setList();
                        } catch (JSONException e) {
                            e.printStackTrace();
                            Log.e("error", String.valueOf(e.getMessage()));

                            listView.setAdapter(null);
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Log.e("kosong", String.valueOf(error.getMessage()));
                    }
                });
        //Creating a request queue
        RequestQueue requestQueue = Volley.newRequestQueue(this);

        //Adding request to the queue
        requestQueue.add(postRequest);
    }

    private void  setList(){
        adapter = new SimpleAdapter(this, mylist, R.layout.listlayout,
                new String[]{"no_resi","namapenerima", "tanggal", "waktu","tlppenerima", "alamatpenerima", "statusku"},
                new int[]{R.id.resi, R.id.nama, R.id.tgl, R.id.estimasi, R.id.telp, R.id.alamat, R.id.status});

        listView.setAdapter(adapter);
    }

    private void getMaps(String resi) {
        Log.e("resi", String.valueOf(resi));
        String url = hosts+"/tugasakhirku/public/api/getmapsdriver/"+resi;;
        Log.e("resi", String.valueOf(url));
        StringRequest postRequest = new StringRequest(Request.Method.GET, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonObj = new JSONObject(response);
                            JSONObject jo = jsonObj.getJSONObject("data");
                            Log.e("data", String.valueOf(jo));

                            Toast.makeText(List.this, "Lihat Posisi Maps Anda, Pusatkan", Toast.LENGTH_SHORT).show();

                            Bundle bundle = new Bundle();
                            bundle.putString("id_nota", jo.getString("id_nota"));
                            bundle.putString("posisi", jo.getString("posisi"));
                            bundle.putString("x_awal", jo.getString("x_awal"));
                            bundle.putString("y_awal", jo.getString("y_awal"));
                            bundle.putString("x_akhir", jo.getString("x_akhir"));
                            bundle.putString("y_akhir", jo.getString("y_akhir"));

                            Intent intent = new Intent(List.this, ShowMaps.class);
                            intent.putExtras(bundle);
                            startActivity(intent);

                        } catch (JSONException e) {
                            e.printStackTrace();
                            Log.e("error", String.valueOf(e.getMessage()));
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(List.this, "Data Tidak Ditemukan", Toast.LENGTH_SHORT).show();
                    }
                });
        //Creating a request queue
        RequestQueue requestQueue = Volley.newRequestQueue(this);

        //Adding request to the queue
        requestQueue.add(postRequest);
    }

}
