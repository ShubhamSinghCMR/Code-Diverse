package com.example.animationsapp;

import android.app.Activity;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.view.animation.Animation;
import android.view.animation.Animation.AnimationListener;
import android.view.animation.AnimationUtils;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

public class MoveActivity extends Activity implements AnimationListener {
	
	 
	
		    private TextView movetxt;
	
		    private Button startBtn;
	
		     
	
		    private Animation animation; 

protected void onCreate(Bundle savedInstanceState) {
	
    // TODO Auto-generated method stub

    super.onCreate(savedInstanceState);

    setContentView(R.layout.move_view);



    // load the animation

    animation = AnimationUtils.loadAnimation(getApplicationContext(), R.anim.move);

      

    // set animation listener
    animation.setAnimationListener(this);



    movetxt = (TextView) findViewById(R.id.moveText);

    startBtn = (Button) findViewById(R.id.start);

    startBtn.setOnClickListener(new OnClickListener() {



        public void onClick(View v) {

            // start the animation

            movetxt.startAnimation(animation);

        }

    });



}

@Override

public void onAnimationEnd(Animation an) {

    // when animation ends

     if (an == animation) {

            Toast.makeText(getApplicationContext(), "Animation Stopped", Toast.LENGTH_SHORT).show();
     }

}



@Override

public void onAnimationRepeat(Animation an) {

    // if the animation repeats

    if (an == animation) {

        Toast.makeText(getApplicationContext(), "Animation Repeated",Toast.LENGTH_SHORT).show();

    }

}



@Override

public void onAnimationStart(Animation an) {

    // when the animation is started

    if (an == animation) {

        Toast.makeText(getApplicationContext(), "Animation Started",

                Toast.LENGTH_SHORT).show();

    }

}
}


