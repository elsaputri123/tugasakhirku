package com.example.aplikasi;

import android.content.Context;
import android.content.SharedPreferences;
import android.graphics.Bitmap;
import android.graphics.Canvas;
import android.graphics.drawable.Drawable;
import android.location.Address;
import android.location.Criteria;
import android.location.Geocoder;
import android.location.Location;
import android.location.LocationManager;
import android.os.Bundle;
import android.util.Log;
import android.widget.EditText;
import android.widget.Toast;

import androidx.core.content.ContextCompat;
import androidx.fragment.app.FragmentActivity;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.google.android.gms.maps.CameraUpdate;
import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.BitmapDescriptor;
import com.google.android.gms.maps.model.BitmapDescriptorFactory;
import com.google.android.gms.maps.model.CameraPosition;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.MarkerOptions;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.List;
import java.util.Locale;
import java.util.Map;
import java.util.Timer;
import java.util.TimerTask;

public class Maps2 extends FragmentActivity implements OnMapReadyCallback {
    private Timer timer = new Timer();
    private GoogleMap mMap;
    Double latitude, longitude;
    EditText maloc, tujuan;
    Double x_akhir, y_akhir;
    String id_user,id_nota;
    SharedPreferences pref;
    String hosts = "http://gabsijawatimur.com";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_maps);
        getMyLocation();
        SupportMapFragment mapFragment = (SupportMapFragment) getSupportFragmentManager()
                .findFragmentById(R.id.map);
        mapFragment.getMapAsync(this);

        pref = getApplicationContext().getSharedPreferences("mypref", 0);

        if(getIntent().getExtras()!=null){
            Bundle bundle = getIntent().getExtras();
            x_akhir = Double.parseDouble(bundle.getString("x_akhir"));
            y_akhir = Double.parseDouble(bundle.getString("y_akhir"));
            id_nota      = String.valueOf(bundle.getString("id_nota"));

            Toast.makeText(Maps2.this, String.valueOf("Coba "+x_akhir+" "+x_akhir+" "+id_nota), Toast.LENGTH_LONG).show();
        }

        maloc = (EditText)findViewById(R.id.maloc);
        tujuan = (EditText)findViewById(R.id.tujuan);


        //if(latitude!=null && longitude!=null){
        timer.scheduleAtFixedRate(new TimerTask() {
            @Override
            public void run() {
                Log.e("Longitude", String.valueOf(getMyLocation().getLongitude()));
                Log.e("Latitude",  String.valueOf(getMyLocation().getLatitude()));

                latitude = getMyLocation().getLatitude();
                longitude= getMyLocation().getLongitude();

                maloc.setText(getCompleteAddressString(y_akhir, x_akhir).toString());

                tujuan.setText(getCompleteAddressString(latitude, longitude).toString());
            }
        }, 0, 1*5*1000);
        //}
    }

    @Override
    public void onMapReady(GoogleMap googleMap) {
        mMap = googleMap;

        LatLng sydney = new LatLng(latitude, longitude);

        LatLng lokasiku = new LatLng(y_akhir, x_akhir);

        mMap.setMyLocationEnabled(true);

        mMap.addMarker(new MarkerOptions()
                .position(sydney)
                .icon(bitmapDescriptorFromVector(Maps2.this, R.drawable.ic_local_shipping_black_24dp))
                .title("Kurir Berjalan"));

        mMap.addMarker(new MarkerOptions().position(lokasiku).title("Tujuan"));

        CameraPosition camPos = new CameraPosition.Builder()
                .target(new LatLng(latitude, longitude))
                .zoom(11.6f)
                .build();

        CameraUpdate camUpdate = CameraUpdateFactory.newCameraPosition(camPos);
        mMap.moveCamera(camUpdate);
        getMyLocation();
    }

    private Location getMyLocation() {
        LocationManager lm = (LocationManager)getSystemService(Context.LOCATION_SERVICE);
        Location myLocation = lm.getLastKnownLocation(LocationManager.GPS_PROVIDER);

        if (myLocation == null) {
            Criteria criteria = new Criteria();
            criteria.setAccuracy(Criteria.ACCURACY_COARSE);
            String provider = lm.getBestProvider(criteria, true);
            myLocation = lm.getLastKnownLocation(provider);
        }

        return myLocation;
    }

    private BitmapDescriptor bitmapDescriptorFromVector(Context context, int vectorResId) {
        Drawable vectorDrawable = ContextCompat.getDrawable(context, vectorResId);
        vectorDrawable.setBounds(0, 0, vectorDrawable.getIntrinsicWidth(), vectorDrawable.getIntrinsicHeight());
        Bitmap bitmap = Bitmap.createBitmap(vectorDrawable.getIntrinsicWidth(), vectorDrawable.getIntrinsicHeight(), Bitmap.Config.ARGB_8888);
        Canvas canvas = new Canvas(bitmap);
        vectorDrawable.draw(canvas);
        return BitmapDescriptorFactory.fromBitmap(bitmap);
    }


    private String getCompleteAddressString(double LATITUDE, double LONGITUDE) {
        String strAdd = "";
        Geocoder geocoder = new Geocoder(this, Locale.getDefault());
        try {
            List<Address> addresses  = geocoder.getFromLocation(LATITUDE,LONGITUDE, 1);
            String address = addresses.get(0).getAddressLine(0);
            String city = addresses.get(0).getLocality();
            String state = addresses.get(0).getAdminArea();
            String zip = addresses.get(0).getPostalCode();
            String country = addresses.get(0).getCountryName();
            strAdd = address+" "+city+" "+state+" "+zip+" "+" "+country;

        } catch (Exception e) {
            e.printStackTrace();
            Log.w("MyLoc", "Canont get Address!");
        }

        return strAdd;
    }
}