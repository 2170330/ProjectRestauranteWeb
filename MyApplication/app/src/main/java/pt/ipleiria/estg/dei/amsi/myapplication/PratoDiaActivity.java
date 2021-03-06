package pt.ipleiria.estg.dei.amsi.myapplication;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.support.annotation.NonNull;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v4.widget.SwipeRefreshLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;

import java.util.ArrayList;

import pt.ipleiria.estg.dei.amsi.myapplication.Adapter.ListaPratoAdapter;
import pt.ipleiria.estg.dei.amsi.myapplication.Modelo.Prato;
import pt.ipleiria.estg.dei.amsi.myapplication.Modelo.SingletonGestorPrato;
import pt.ipleiria.estg.dei.amsi.myapplication.listeners.PratoListener;
import pt.ipleiria.estg.dei.amsi.myapplication.utils.PratoJsonParser;

public class PratoDiaActivity  extends AppCompatActivity implements NavigationView.OnNavigationItemSelectedListener, PratoListener {

    private ListView lvListView;
    private ArrayList<Prato> listaPratos;
    final static String DETALHES_PRATO_DIA = "Pratos";
    final static String LISTA_PRATO = "Lista Pratos";

    SharedPreferences sharedPref;
    SharedPreferences.Editor editor;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_prato_dia);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbarPratoDia);
        setSupportActionBar(toolbar);

        setTitle("Lista Pratos do Dia");
        sharedPref = getPreferences(Context.MODE_PRIVATE);
        editor = sharedPref.edit();

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout_prato_dia);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.addDrawerListener(toggle);
        toggle.syncState();

        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);

        SingletonGestorPrato.getInstance(getApplicationContext()).setPratoListener(this);
        SingletonGestorPrato.getInstance(getApplicationContext()).getAllPratoAPI(getApplicationContext(), PratoJsonParser.isConnectionInternet(getApplicationContext()));
        lvListView = (ListView) findViewById(R.id.listviewListaPratosDia);

        lvListView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                Prato tempPrato = (Prato) parent.getItemAtPosition(position);
                //Intent intent = new Intent(getApplicationContext(), DetalhesPratoActivity.class);
                //intent.putExtra(DETALHES_PRATO_DIA, tempPrato.getId());
                //startActivity(intent);
            }
        });

        final SwipeRefreshLayout swipeRefreshLayout = findViewById(R.id.swiperefreshPratoDia);
        swipeRefreshLayout.setOnRefreshListener(new SwipeRefreshLayout.OnRefreshListener() {
            @Override
            public void onRefresh() {
                SingletonGestorPrato.getInstance(getApplicationContext()).getAllPratoAPI(getApplicationContext(), PratoJsonParser.isConnectionInternet(getApplicationContext()));
                swipeRefreshLayout.setRefreshing(false);
            }
        });
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

    @Override
    public boolean onNavigationItemSelected(@NonNull MenuItem menuItem) {
        int id = menuItem.getItemId();

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


    @Override
    public void onRefreshListaPrato(ArrayList<Prato> listaPrato) {
        if (!listaPrato.isEmpty()){
            ListaPratoAdapter listaPratoAdapter = new ListaPratoAdapter(this, listaPrato);
            lvListView.setAdapter(listaPratoAdapter);
            listaPratoAdapter.refresh(listaPrato);
        }
    }

    @Override
    public void onUpdateListaPratoBD(Prato prato, int operacao) {

    }

    @Override
    protected void onPostResume() {
        super.onPostResume();
        SingletonGestorPrato.getInstance(getApplicationContext()).getAllPratoAPI(getApplicationContext(), PratoJsonParser.isConnectionInternet(getApplicationContext()));
    }
}
