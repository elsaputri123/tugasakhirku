package com.example.aplikasi;

import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
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

public class kalkulator extends AppCompatActivity {
    EditText berat, panjang, lebar, tinggi, jumlah; TextView hasil;
    Button btn;
    public int berat1, panjang1, lebar1, tinggi1, jumlah1, hitungan, harga;
    Spinner spinner;
    private ArrayList<String> lokasi;
    //JSON Array
    private JSONArray result;
    String hosts = "http://gabsijawatimur.com";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_kalkulator);

        berat = (EditText)findViewById(R.id.berat);
        panjang = (EditText)findViewById(R.id.panjang);
        lebar = (EditText)findViewById(R.id.lebar);
        tinggi = (EditText)findViewById(R.id.tinggi);
        jumlah = (EditText)findViewById(R.id.jumlah);
        hasil = (TextView)findViewById(R.id.hasil);
        spinner = (Spinner)findViewById(R.id.spinner);

        btn = (Button) findViewById(R.id.hitung);

        lokasi = new ArrayList<String>();
        getData();

        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                if(jumlah.getText().toString().equals("")||
                        berat.getText().toString().equals("")){

                    Toast.makeText(kalkulator.this, "Jangan Kosongi Kolom Berat, Jumlah",
                            Toast.LENGTH_LONG).show();
                }else if(
                        lebar.getText().toString().equals("") || tinggi.getText().toString().equals("") || jumlah.getText().toString().equals("")){

                    panjang.setText("0");
                    lebar.setText("0");
                    tinggi.setText("0");

                    berat1 = Integer.parseInt(berat.getText().toString());
                    int total = berat1*harga;

                    hasil.setText("Rp. "+String.valueOf(total));

                } else{
                    panjang1 = Integer.parseInt(panjang.getText().toString());
                    lebar1 = Integer.parseInt(lebar.getText().toString());
                    tinggi1 = Integer.parseInt(tinggi.getText().toString());
                    jumlah1 = Integer.parseInt(jumlah.getText().toString());

                    hitungan = panjang1*lebar1*tinggi1*jumlah1/4000;
                    Log.e("hitung", String.valueOf(hitungan));

                    if (hitungan>50){
                        Toast.makeText(kalkulator.this, "Berat Lebih dari 50 Kg, Masukan Berat",
                                Toast.LENGTH_LONG).show();

                        panjang.setText("0");
                        lebar.setText("0");
                        tinggi.setText("0");

                        berat1 = Integer.parseInt(berat.getText().toString());
                        int total = berat1*harga;

                        hasil.setText("Rp. "+String.valueOf(total));
                    }else if(hitungan<50){
                        berat1 = Integer.parseInt(berat.getText().toString());
                        int total = berat1*harga;

                        hasil.setText("Rp. "+String.valueOf(total));
                    }else{
                        int total = hitungan*harga;
                        hasil.setText("Rp. "+String.valueOf(total));
                    }
                }
            }
        });

        spinner.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                try {
                    //Getting json object
                    JSONObject json = result.getJSONObject(position);
                    Log.e("Tulisan", json.getString("harga"));
                    harga = Integer.parseInt(json.getString("harga"));

                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {

            }
        });
    }

    private void getData(){
        //Creating a string request
        String url = hosts+"/tugasakhirku/public/api/tarif";
        StringRequest postRequest = new StringRequest(Request.Method.GET, url,
        new Response.Listener<String>() {
            @Override
                    public void onResponse(String response) {

                        JSONObject j = null;
                        try {
                            //Parsing the fetched Json String to JSON Object
                            j = new JSONObject(response);

                            //Storing the Array of JSON String to our JSON Array
                            result = j.getJSONArray("data");
                            //Calling method getStudents to get the students from the JSON Array
                            getStudents(result);
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

    private void getStudents(JSONArray j){
        //Traversing through all the items in the json array

        for(int i=0;i<j.length();i++){
            try {
                //Getting json object
                JSONObject json = j.getJSONObject(i);
                //Adding the name of the student to array list
                lokasi.add(json.getString("tujuan"));
            } catch (JSONException e) {
                e.printStackTrace();
            }
        }

        //Setting adapter to show the items in the spinner
        spinner.setAdapter(new ArrayAdapter<String>(kalkulator.this, android.R.layout.simple_spinner_dropdown_item, lokasi));
    }
}
