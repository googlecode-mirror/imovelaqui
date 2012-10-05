package edu.univas.imovelaqui;

import android.os.Bundle;
import android.app.Activity;
import android.view.Menu;

public class ImovelAqui extends Activity {

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_imovel_aqui);
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.activity_imovel_aqui, menu);
        return true;
    }
}
