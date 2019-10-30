package com.example.aplikasi;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

public class Login extends AppCompatActivity {
    Button btlogin, btbatal;
    EditText uname, pass;
    ServerRequest server;
    String hosts = "http://192.168.43.148/";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        btlogin = (Button)findViewById(R.id.btlogin);
        btbatal = (Button)findViewById(R.id.btcancel);
        uname   = (EditText)findViewById(R.id.uname);
        pass   = (EditText)findViewById(R.id.pass);

        btlogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                getLogin();
            }
        });

        btbatal.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                uname.setText("");
                pass.setText("");
            }
        });


    }

    private void getLogin() {
        String name = String.valueOf(uname.getText());
        String passw = String.valueOf(pass.getText());

        String url = hosts+"tugasakhirku/public/api/login/"+name+"/"+passw;;
        StringRequest postRequest = new StringRequest(Request.Method.GET, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonObj = new JSONObject(response);
                            JSONObject jo = jsonObj.getJSONObject("data");
                            Log.e("data", String.valueOf(jo));

                            Toast.makeText(Login.this, "Selamat Datang Kurir", Toast.LENGTH_SHORT).show();

                            Intent i = new Intent(Login.this, List.class);
                            startActivity(i);

                        } catch (JSONException e) {
                            e.printStackTrace();
                            Log.e("error", String.valueOf(e.getMessage()));
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(Login.this, "Username / Email / Password Tidak Terdaftar", Toast.LENGTH_SHORT).show();
                        Log.e("kosong", String.valueOf(error.getMessage()));
                    }
                });
        //Creating a request queue
        RequestQueue requestQueue = Volley.newRequestQueue(this);

        //Adding request to the queue
        requestQueue.add(postRequest);
    }
}
