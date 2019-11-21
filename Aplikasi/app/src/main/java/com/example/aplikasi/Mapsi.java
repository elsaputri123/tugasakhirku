package com.example.aplikasi;

import android.location.Location;
import android.os.Bundle;

import androidx.appcompat.app.AppCompatActivity;

import com.google.android.gms.maps.GoogleMap;

public class Mapsi extends AppCompatActivity {
    public double latitude;
    public double longitude;
    Location myLocation;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_mapsi);

    }

    private GoogleMap.OnMyLocationChangeListener myLocationChangeListener = new GoogleMap.OnMyLocationChangeListener() {

        @Override
        public void onMyLocationChange(Location location) {

            myLocation = location;

        }
    };
}
