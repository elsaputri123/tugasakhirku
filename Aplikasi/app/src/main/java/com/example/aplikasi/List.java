package com.example.aplikasi;

import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
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
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list);
        listView = (ListView)findViewById(R.id.list_view);
        spNamen = (Spinner) findViewById(R.id.spinner2);
        Button btnfilter = (Button)findViewById(R.id.button4);

        final ArrayAdapter<String> adapter = new ArrayAdapter<>(this,
                android.R.layout.simple_spinner_dropdown_item, germanFeminine);
        spNamen.setAdapter(adapter);
        url = "http://192.168.43.148/tugasakhirku/public/api/notakirim";

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
                    Options = new String[]{"Track Lokasi","Sampai"};
                }else if(status.equals("6")){
                    Options = new String[]{"Konfirmasi Terima"};
                }

                AlertDialog.Builder builder = new AlertDialog.Builder(List.this);
                builder.setTitle("Pilih Opsi");
                builder.setItems(Options, new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        Log.e("cek", String.valueOf(status));

                        if (status.equals("3")){
                            Bawa(Integer.valueOf(status));
                        }else if (status.equals("4")){
                            Kirim(Integer.valueOf(status));
                        }else if (status.equals("5")){
                            if (which==0){
                                getMaps(code);
                            }else{
                                Sampai(Integer.valueOf(status));
                            }
                        }else if (status.equals("6")){
                            Konfirmasi(Integer.valueOf(status));
                        }
                    }
                });

                builder.show();
                load();
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

                url = "http://192.168.43.148/tugasakhirku/public/api/notakirim/"+baru;
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
        String url = "http://192.168.43.148/tugasakhirku/public/api/bawa/"+which+"/"+4;
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
        String url = "http://192.168.43.148/tugasakhirku/public/api/kirim/"+which;
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
        String url = "http://192.168.43.148/tugasakhirku/public/api/sampai/"+which;
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

    private void Konfirmasi(int which){
        String url = "http://192.168.43.148/tugasakhirku/public/api/konfirmasi/"+which;
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
                                int status = Integer.parseInt(c.getString("status"));

                                HashMap<String, String> event = new HashMap<>();
                                // add map
                                event.put("id", id);
                                event.put("no_resi", id+". No Resi : "+no_resi);
                                event.put("tanggal", "Tanggal Kirim : "+tanggal);
                                event.put("namapenerima", "Penerima : "+namapenerima);
                                event.put("tlppenerima", "Telp : "+tlppenerima);
                                event.put("status", String.valueOf(status));
                                event.put("alamatpenerima", "Alamat Penerima : "+alamatpenerima);

                                if (status==1){
                                    event.put("statusku", "Paket Masuk");
                                }else if(status==2){
                                    event.put("statusku", "Dikirim Ke Kantor Cabang");
                                }else if(status==3){
                                    event.put("statusku", "Sampai Ke Kantor Cabang");
                                }else if(status==4){
                                    event.put("statusku", "Dibawa Kurir");
                                }else if(status==5){
                                    event.put("statusku", "Menuju Ke Alamat Penerima");
                                }else if(status==6){
                                    event.put("statusku", "Paket Sampai");
                                }else{
                                    event.put("statusku", "Konfirmasi Paket");
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
                new String[]{"no_resi","namapenerima", "tanggal","tlppenerima", "alamatpenerima", "statusku"},
                new int[]{R.id.resi, R.id.nama, R.id.tgl, R.id.telp, R.id.alamat, R.id.status});

        listView.setAdapter(adapter);
    }

    private void getMaps(String resi) {
        Log.e("error", String.valueOf(resi));
        String url = "http://192.168.43.148/tugasakhirku/public/api/getmaps/"+resi;;
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
                            bundle.putString("posisi", jo.getString("posisi"));
                            bundle.putString("x_awal", jo.getString("x_awal"));
                            bundle.putString("y_awal", jo.getString("y_awal"));
                            bundle.putString("x_akhir", jo.getString("x_akhir"));
                            bundle.putString("y_akhir", jo.getString("y_akhir"));

                            Intent intent = new Intent(List.this, MapsActivity.class);
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
