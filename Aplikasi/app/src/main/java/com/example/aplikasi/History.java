package com.example.aplikasi;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.TextView;
import android.widget.Toast;

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

public class History extends AppCompatActivity {

    Button cari, btnmaps;
    TextView tvresi, tvnama, tvalamat, tvtelp, tvtanggal,estimasi;
    ListView listView;
    EditText resi;
    SimpleAdapter adapter;
    HashMap<String, String> map;
    ArrayList<HashMap<String, String>> mylist;
    String hosts;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_history);

        hosts = new Server().getUrl();

        cari = (Button)findViewById(R.id.cari);
        btnmaps = (Button)findViewById(R.id.btnmaps);
        resi = (EditText)findViewById(R.id.resi);

        btnmaps.setVisibility(View.INVISIBLE);


        tvresi = (TextView) findViewById(R.id.noresi);
        tvnama = (TextView) findViewById(R.id.nama);
        tvtanggal = (TextView) findViewById(R.id.tgl);
        tvtelp = (TextView) findViewById(R.id.telp);
        tvalamat = (TextView) findViewById(R.id.alamat);
        estimasi = (TextView) findViewById(R.id.estimasi);
        listView = (ListView)findViewById(R.id.listku);

        btnmaps.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                getMaps();
            }
        });

        cari.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                loadData();
            }
        });
    }

    private void getMaps() {
        String nores = String.valueOf(resi.getText());
        String url = hosts+"/tugasakhirku/public/api/getmaps/"+nores;;
        StringRequest postRequest = new StringRequest(Request.Method.GET, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonObj = new JSONObject(response);
                            JSONObject jo = jsonObj.getJSONObject("data");
                            Log.e("data", String.valueOf(jo));

                            Toast.makeText(History.this, "Lihat Posisi Maps Anda, Pusatkan", Toast.LENGTH_SHORT).show();

                            Bundle bundle = new Bundle();
                            bundle.putString("id_nota", jo.getString("id_nota"));
                            bundle.putString("posisi", jo.getString("posisi"));
                            bundle.putString("x_awal", jo.getString("x_awal"));
                            bundle.putString("y_awal", jo.getString("y_awal"));
                            bundle.putString("x_akhir", jo.getString("x_akhir"));
                            bundle.putString("y_akhir", jo.getString("y_akhir"));

                            Intent intent = new Intent(History.this, Maps2.class);
                            intent.putExtras(bundle);
                            startActivity(intent);

                        } catch (JSONException e) {
                            e.printStackTrace();
                            Log.e("error", String.valueOf(e.getMessage()));
                            Toast.makeText(History.this, "Data Tidak Ditemukan", Toast.LENGTH_SHORT).show();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(History.this, "Data Tidak Ditemukan", Toast.LENGTH_SHORT).show();
                    }
                });
        //Creating a request queue
        RequestQueue requestQueue = Volley.newRequestQueue(this);

        //Adding request to the queue
        requestQueue.add(postRequest);
    }

    private void loadData() {
        String nores = String.valueOf(resi.getText());
        String url = hosts+"/tugasakhirku/public/api/tracking/"+nores;;
        StringRequest postRequest = new StringRequest(Request.Method.GET, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonObj = new JSONObject(response);
                            // Getting JSON Array node
                            JSONArray events = jsonObj.getJSONArray("data");
                            mylist = new ArrayList<HashMap<String, String>>();
                            JSONObject jo = jsonObj.getJSONObject("detail");
                            Log.e("error", String.valueOf(jo));

                            tvresi.setText(String.valueOf(jo.getString("no_resi")));
                            tvnama.setText(String.valueOf("Nama Tujuan : "+jo.getString("namapenerima")));
                            tvalamat.setText(String.valueOf("Alamat : "+jo.getString("alamatpenerima")));
                            tvtelp.setText(String.valueOf("Telp"+jo.getString("tlppenerima")));
                            tvtanggal.setText(String.valueOf("Tanggal Kirim : "+jo.getString("tanggal")));
                            estimasi.setText(String.valueOf("Estimasi sampai : "+jo.getString("waktu")));
                            int stts = Integer.parseInt(jo.getString("status"));

                            if (stts==5){
                                btnmaps.setVisibility(View.VISIBLE);
                            }else if(stts!=5){
                                btnmaps.setVisibility(View.INVISIBLE);
                            }

                            // looping through All Contacts
                            for (int i = 0; i < events.length(); i++) {
                                JSONObject c = events.getJSONObject(i);

                                String id = c.getString("id");
                                String tanggal = c.getString("created_at");
                                int status = Integer.parseInt(c.getString("status"));

                                HashMap<String, String> event = new HashMap<>();
                                // add map
                                event.put("id", id);
                                event.put("tanggal", tanggal);
                                event.put("status", String.valueOf(status));

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

                            setList();
                        } catch (JSONException e) {
                            e.printStackTrace();
                            Toast.makeText(History.this, "Data Tidak Ditemukan", Toast.LENGTH_SHORT).show();
                            Log.e("error", String.valueOf(e.getMessage()));

                            listView.setAdapter(null);
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(History.this, "Data Tidak Ditemukan", Toast.LENGTH_SHORT).show();
                        Log.e("kosong", String.valueOf(error.getMessage()));
                    }
                });
        //Creating a request queue
        RequestQueue requestQueue = Volley.newRequestQueue(this);

        //Adding request to the queue
        requestQueue.add(postRequest);
    }


    private void  setList(){
        adapter = new SimpleAdapter(this, mylist, R.layout.list_history,
                new String[]{"tanggal","statusku"},
                new int[]{R.id.txttgl, R.id.txtstatus});

        listView.setAdapter(adapter);
    }
}
