package com.example.aplikasi;

import android.os.Bundle;
import android.util.Log;

import androidx.fragment.app.FragmentActivity;

import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.MarkerOptions;

public class MapsActivity extends FragmentActivity implements OnMapReadyCallback {
    private GoogleMap mMap;
    String posisi;
    Double x_awal, x_akhir, y_awal, y_akhir;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_maps);
        // Obtain the SupportMapFragment and get notified when the map is ready to be used.
        SupportMapFragment mapFragment = (SupportMapFragment) getSupportFragmentManager()
                .findFragmentById(R.id.map);
        mapFragment.getMapAsync(this);


    }

    @Override
    public void onMapReady(GoogleMap googleMap) {
        mMap = googleMap;

        if(getIntent().getExtras()!=null){
            Bundle bundle = getIntent().getExtras();
            Log.e("posisi", String.valueOf(bundle.getString("posisi")));
            Log.e("x_awal", String.valueOf(bundle.getString("x_awal")));
            Log.e("y_awal", String.valueOf(bundle.getString("y_awal")));
//            Log.e("x_akhir", String.valueOf(bundle.getString("x_akhir")));
//            Log.e("y_akhir", String.valueOf(bundle.getString("y_akhir")));

            posisi = String.valueOf(bundle.getString("posisi"));
            x_akhir = Double.valueOf(bundle.getString("x_akhir"));
            y_akhir = Double.valueOf(bundle.getString("y_akhir"));
        }

        Log.e("x_akhir", String.valueOf(x_akhir));
        Log.e("y_akhir", String.valueOf(y_akhir));

        // Add a marker in Sydney and move the camera
        LatLng myloc = new LatLng(y_akhir, x_akhir);
        mMap.setMyLocationEnabled(true);

        mMap.addMarker(new MarkerOptions().position(myloc).title("Surabaya"));
        mMap.moveCamera(CameraUpdateFactory.newLatLng(myloc));
    }
}
