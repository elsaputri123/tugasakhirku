package com.example.aplikasi;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.Toast;

import com.android.volley.DefaultRetryPolicy;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.RetryPolicy;
import com.android.volley.VolleyError;
import com.android.volley.VolleyLog;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import org.json.JSONArray;

public class kalkulator extends AppCompatActivity {
    EditText berat, panjang, lebar, tinggi, jumlah, hasil;
    Button btn;
    public int berat1, panjang1, lebar1, tinggi1, jumlah1, hitungan, harga;
    Spinner spinner;
    private ArrayList<String> lokasi;
    //JSON Array
    private JSONArray result;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_kalkulator);

        berat = (EditText)findViewById(R.id.berat);
        panjang = (EditText)findViewById(R.id.panjang);
        lebar = (EditText)findViewById(R.id.lebar);
        tinggi = (EditText)findViewById(R.id.tinggi);
        jumlah = (EditText)findViewById(R.id.jumlah);
        hasil = (EditText)findViewById(R.id.hasil);
        spinner = (Spinner)findViewById(R.id.spinner);

        btn = (Button) findViewById(R.id.hitung);
        berat.setVisibility(View.INVISIBLE);

        lokasi = new ArrayList<String>();
        getData();

        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                panjang1 = Integer.parseInt(panjang.getText().toString());
                lebar1 = Integer.parseInt(lebar.getText().toString());
                tinggi1 = Integer.parseInt(tinggi.getText().toString());
                jumlah1 = Integer.parseInt(jumlah.getText().toString());

                hitungan = panjang1*lebar1*tinggi1*jumlah1/4000;

                Log.e("hitung", String.valueOf(hitungan));

                if (hitungan>50){
                    Toast.makeText(kalkulator.this, "Berat Lebih dari 50 Kg",
                            Toast.LENGTH_LONG).show();

                    if (berat.getVisibility() == View.VISIBLE) {
                        berat1 = Integer.parseInt(berat.getText().toString());
                        int total = berat1*harga;

                        hasil.setText(String.valueOf(total));
                    } else {
                        berat.setVisibility(View.VISIBLE);
                    }

                }else{
                    int total = hitungan*harga;
                    hasil.setText(String.valueOf(total));
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
        String url = "http://192.168.43.148/tugasakhirku/public/api/tarif";
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
