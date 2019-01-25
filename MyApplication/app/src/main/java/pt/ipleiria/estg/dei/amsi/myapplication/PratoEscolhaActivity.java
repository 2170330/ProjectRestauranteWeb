package pt.ipleiria.estg.dei.amsi.myapplication;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.support.annotation.NonNull;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;

public class PratoEscolhaActivity extends AppCompatActivity implements NavigationView.OnNavigationItemSelectedListener {

    SharedPreferences sharedPref;
    SharedPreferences.Editor editor;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_prato_escolha);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbarPratoEscolha);
        setSupportActionBar(toolbar);

        setTitle("Tipo de Prato");
        sharedPref = getPreferences(Context.MODE_PRIVATE);
        editor = sharedPref.edit();

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout_prato_escolha);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.addDrawerListener(toggle);
        toggle.syncState();

        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);
    }

    @Override
    public void onBackPressed() {
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        if (drawer.isDrawerOpen(GravityCompat.START)) {
            drawer.closeDrawer(GravityCompat.START);
        } else {
            super.onBackPressed();
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }


    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item) {
        // Handle navigation view item clicks here.
        int id = item.getItemId();

        if (id == R.id.nav_home) {
            Intent home = new Intent(getApplicationContext(), MainActivity.class);
            startActivity(home);
        } else if (id == R.id.nav_conta) {

        } else if (id == R.id.nav_menus) {

        } else if (id == R.id.nav_pratos) {
            Intent tipoPrato = new Intent(getApplicationContext(), PratoEscolhaActivity.class);
            startActivity(tipoPrato);

        } else if (id == R.id.nav_bebidas) {

        } else if (id == R.id.nav_subremensas) {

        } else if (id == R.id.nav_comentarios){

        }

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }
}
