package pt.ipleiria.estg.dei.amsi.myapplication.Adapter;

import android.content.Context;
import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.v4.view.PagerAdapter;
import android.support.v4.view.ViewPager;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.Toast;

import pt.ipleiria.estg.dei.amsi.myapplication.PratoDiaActivity;
import pt.ipleiria.estg.dei.amsi.myapplication.R;

public class SlidePageAdapter extends PagerAdapter {

    private Context context;
    private LayoutInflater layoutInflater;
    private Integer [] images = {R.drawable.vegan,R.drawable.peixe,R.drawable.carne};
    private View view;

    public SlidePageAdapter (Context context){
        this.context = context;
    }

    @Override
    public int getCount() {
        return images.length;
    }

    @Override
    public boolean isViewFromObject(View view, Object object) {
        return view == object;
    }


    @Override
    public Object instantiateItem(final ViewGroup container, final int position) {
        layoutInflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
        final View view = layoutInflater.inflate(R.layout.slide_img_view_pager_layout, null);
        ImageView imageView = (ImageView) view.findViewById(R.id.imageView);
        imageView.setImageResource(images[position]);

        view.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View v) {
                if ((position == 0)||(position == 1) || (position == 2)){
                    Toast.makeText(context, "Slide 1 Clicked", Toast.LENGTH_SHORT).show();
                    Intent intent = new Intent(context, PratoDiaActivity.class);
                    context.startActivity(intent);
                }
            }
        });
        ViewPager viewPager = (ViewPager) container;
        viewPager.addView(view, 0);
        return view;
    }

    @Override
    public void destroyItem(@NonNull ViewGroup container, int position, @NonNull Object object) {

        ViewPager viewPager = (ViewPager) container;
        View view = (View)object;
        viewPager.removeView(view);
    }
}
