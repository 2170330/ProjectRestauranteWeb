package pt.ipleiria.estg.dei.amsi.androidpr.ativity;

import android.os.Handler;
import android.support.annotation.NonNull;
import android.support.design.bottomnavigation.LabelVisibilityMode;
import android.support.design.widget.NavigationView;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentTransaction;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;

import pt.ipleiria.estg.dei.amsi.androidpr.R;
import pt.ipleiria.estg.dei.amsi.androidpr.fragment.ComentariosFragment;
import pt.ipleiria.estg.dei.amsi.androidpr.fragment.ContaFragment;
import pt.ipleiria.estg.dei.amsi.androidpr.fragment.HomeFragment;
import pt.ipleiria.estg.dei.amsi.androidpr.fragment.PratoCarneFragment;
import pt.ipleiria.estg.dei.amsi.androidpr.fragment.PratoDiaFragment;
import pt.ipleiria.estg.dei.amsi.androidpr.fragment.SubMenuBebidasFragment;
import pt.ipleiria.estg.dei.amsi.androidpr.fragment.SubMenuComidaFragment;
import pt.ipleiria.estg.dei.amsi.androidpr.fragment.SubremensasFragment;

public class PratoDoDIa extends AppCompatActivity {
    private NavigationView navigationView;
    private DrawerLayout drawer;
    private View navHeader;
    private Toolbar toolbar;

    /** index to indentify current nav menu item */
    public static int navItemIndex = 10;

    /** tags used to attach the fragments */
    private static final String TAG_HOME = "Página Inicial";
    private static final String TAG_PRATO_DO_DIA = "Prato do Dia";
    private static final String TAG_CONTA = "Conta";
    private static final String TAG_MENUS = "Menus";
    private static final String TAG_PRATOS = "Pratos";
    private static final String TAG_BEBIDAS = "Bebidas";
    private static final String TAG_SUBREMENSAS = "Subremensas";
    private static final String TAG_COMENTARIOS = "Comentários";
    private static final String TAG_PRATOS_DIA = "Pratos do Dia";
    public static String CURRENT_TAG = TAG_PRATO_DO_DIA;

    /** toolbar titles respeted to selected nav item */
    private String[] activityTitles;

    /** flag to load home fragment when user presses back key */
    private boolean shouldLoadHomeFragOnBackPress = true;
    private Handler mHandler;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_side_bar_menu);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        mHandler = new Handler();

        drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        navigationView = (NavigationView) findViewById(R.id.nav_view);

        /** load toolbar titles from string resources */
        activityTitles = getResources().getStringArray(R.array.nav_item_activity_titles);

        /** initializing navigation menu */
        setUpNavigationView();

        if (savedInstanceState == null){
            navItemIndex = 10;
            CURRENT_TAG = TAG_PRATO_DO_DIA;
            loadHomeFragment();
        }
    }

    private void setUpNavigationView() {
        /** setting navigation view item selected listener to handle the item click of navigation menu */
        navigationView.setNavigationItemSelectedListener(new NavigationView.OnNavigationItemSelectedListener() {
            /** this method will trigger on item Click of navigation menu */
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem menuItem) {
                /** check to see which item was being clicked and perform appropriate action */
                switch (menuItem.getItemId()){
                    /** replacing the main content with ContentFragment which is our Inbox View */
                    case R.id.nav_home:
                        navItemIndex = 0;
                        CURRENT_TAG = TAG_HOME;
                        break;
                    case R.id.nav_conta:
                        navItemIndex = 1;
                        CURRENT_TAG = TAG_CONTA;
                        break;
                    case R.id.nav_menus:
                        navItemIndex = 2;
                        CURRENT_TAG = TAG_MENUS;
                    case R.id.nav_pratos:
                        navItemIndex = 3;
                        CURRENT_TAG = TAG_PRATOS;
                        break;
                    case R.id.nav_bebidas:
                        navItemIndex = 4;
                        CURRENT_TAG = TAG_BEBIDAS;
                        break;
                    case R.id.nav_subremensas:
                        navItemIndex = 5;
                        CURRENT_TAG = TAG_SUBREMENSAS;
                        break;
                    case R.id.nav_comentarios:
                        navItemIndex = 6;
                        CURRENT_TAG = TAG_COMENTARIOS;
                        break;
                    default:
                        navItemIndex = 10;
                }
                /** checking if the item is in checked state or not, if not make it in checked state */
                if (menuItem.isChecked()){
                    menuItem.setChecked(false);
                }else {
                    menuItem.setChecked(true);
                }
                menuItem.setChecked(true);

                loadHomeFragment();
                return true;
            }
        });

        ActionBarDrawerToggle actionBarDrawerToggle = new ActionBarDrawerToggle(this, drawer, toolbar, R.string.openDrawer, R.string.closeDrawer){
            @Override
            public void onDrawerClosed(View drawerView) {
                /** code here will be triggered once the drawer closes as we don't want anything so we leave this blank */
                super.onDrawerClosed(drawerView);
            }

            @Override
            public void onDrawerOpened(View drawerView) {
                /** code here will be triggered once the drawer open as we don't want anything so we leave this blank */
                super.onDrawerOpened(drawerView);
            }
        };
        /** setting the actionbarToggle to drawer layout */
        drawer.setDrawerListener(actionBarDrawerToggle);

        /** calling sync state is necessary or else your hamburger icon wont show up */
        actionBarDrawerToggle.syncState();
    }

    private void loadHomeFragment() {
        /** selecting appropriate nav menu item */
        selectNavMenu();
        /** set toolbar title */
        setToolbarTitle();

        /** if user select the current navigation menu again, don't do anything */
        //just close the navigation drawer

        if (getSupportFragmentManager().findFragmentByTag(CURRENT_TAG) != null){
            drawer.closeDrawers();
            return;
        }
        Runnable mPendingRunnable = new Runnable() {
            @Override
            public void run() {
                Fragment fragment = getHomeFragment();
                FragmentTransaction fragmentTransaction = getSupportFragmentManager().beginTransaction();
                fragmentTransaction.setCustomAnimations(android.R.anim.fade_in, android.R.anim.fade_out);
                fragmentTransaction.replace(R.id.frame_toolbar, fragment, CURRENT_TAG);
                fragmentTransaction.commitAllowingStateLoss();
            }
        };

        /** if mPendingRunnable is not null, then add to the message queue */
        if (mPendingRunnable !=null){
            mHandler.post(mPendingRunnable);
        }

        /** Closing drawer on item click */
        drawer.closeDrawers();

        /** refresh toolbar menu */
        invalidateOptionsMenu();

    }

    private void selectNavMenu() {
        if (navItemIndex != 10) {
            navigationView.getMenu().getItem(navItemIndex).setChecked(true);
        }
    }

    private void setToolbarTitle() {
        if (navItemIndex != 10) {
            getSupportActionBar().setTitle(activityTitles[navItemIndex]);
        } else {
            getSupportActionBar().setTitle("Prato do Dia");
        }
    }

    private Fragment getHomeFragment() {
        switch (navItemIndex){
            case 0:
                /** Página Inicial */
                HomeFragment homeFragment = new HomeFragment();
                return homeFragment;
            case 1:
                /** Conta */
                ContaFragment contaFragment = new ContaFragment();
                return contaFragment;
            case 2:
                /** Menus */
                SubMenuComidaFragment subMenuComidaFragmentMenus = new SubMenuComidaFragment();
                return subMenuComidaFragmentMenus;
            case 3:
                /** Pratos */
                SubMenuComidaFragment subMenuComidaFragmentPratos = new SubMenuComidaFragment();
                return subMenuComidaFragmentPratos;
            case 4:
                /** Bebidas */
                SubMenuBebidasFragment subMenuBebidasFragment = new SubMenuBebidasFragment();
                return subMenuBebidasFragment;
            case 5:
                /** Subremensas */
                SubremensasFragment subremensasFragment = new SubremensasFragment();
                return subremensasFragment;
            case 6:
                /** Comentários */
                ComentariosFragment comentariosFragment = new ComentariosFragment();
                return comentariosFragment;
            case 10:
                PratoDiaFragment pratoCarneFragment = new PratoDiaFragment();
                return pratoCarneFragment;
            default:
                return new PratoDiaFragment();
        }
    }

    @Override
    public void onBackPressed() {
        if (drawer.isDrawerOpen(GravityCompat.START)){
            drawer.closeDrawers();
            return;
        }

        /** This code loads home fragment when back key is pressed
         * when user is in other fragment than home */
        if (shouldLoadHomeFragOnBackPress){
            /** checking id user is on other navigation menu
             * rather than home */
            if (navItemIndex != 10){
                navItemIndex = 10;
                CURRENT_TAG = TAG_PRATO_DO_DIA;
                loadHomeFragment();
                return;
            }
        }
        super.onBackPressed();
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        /** Inflate the menu; this adds items to the action bar if it is present.
         * show menu only when home fragment is selected*/
        if (navItemIndex == 0){
            getMenuInflater().inflate(R.menu.side_bar_menu, menu);
        }
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }
}

