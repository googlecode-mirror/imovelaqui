package edu.univas.imovelaqui;

import org.apache.cordova.DroidGap;

import android.os.Bundle;

public class ImovelAqui extends DroidGap {

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        super.loadUrl("file:///android_asset/www/index.html");
    }
}
