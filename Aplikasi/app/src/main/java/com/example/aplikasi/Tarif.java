package com.example.aplikasi;

import android.os.Bundle;
import android.util.Log;
import android.widget.ListView;
import android.widget.SimpleAdapter;

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

public class Tarif extends AppCompatActivity {
    ListView lv;
    SimpleAdapter adapter;
    HashMap<String, String> map;
    ArrayList<HashMap<String, String>> mylist;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_tarif);
        lv = (ListView) findViewById(R.id.list_view);
        load();
    }

    private void load() {
        String url = "http://192.168.1.10/tugasakhirku/public/api/tarif";
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
                                String tujuan = c.getString("tujuan");
                                int harga = Integer.parseInt(c.getString("harga"));

                                HashMap<String, String> event = new HashMap<>();
                                // add map
                                event.put("id", id+". ");
                                event.put("tujuan", tujuan);
                                event.put("harga", "Rp. "+String.valueOf(harga));

                                mylist.add(event);
                            }
                            Log.e("maplist : ", String.valueOf(mylist));
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

    private void  setList(){
        adapter = new SimpleAdapter(this, mylist, R.layout.layout_tarif,
                new String[]{"id","tujuan", "harga"}, new int[]{R.id.txt_id, R.id.txt_judul,R.id.txt_harga});

        lv.setAdapter(adapter);
    }
}
