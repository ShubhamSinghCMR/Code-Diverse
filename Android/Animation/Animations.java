package com.example.animationsapp;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.View.OnClickListener;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

public class MainActivity extends Activity {

	 private Button fade;
	 
	 	    private Button zoom;
	 
	 	    private Button moveIntent;
	 
	 	    private Button rotate;
	 
	 	    private TextView mytext;
	 
	 	    private ImageView myimage;
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		
		
		 mytext = (TextView) findViewById(R.id.text);
		 
		      myimage = (ImageView) findViewById(R.id.image);
		 
		 	       
		 
		 	      fade = (Button) findViewById(R.id.fade);
		 
		 	      fade.setOnClickListener(new OnClickListener() {
		 
		 	         
		 
		 	        @Override
				 	        public void onClick(View v) {
		             // TODO Auto-generated method stub
		 
		 	            fadeAnimation(v);
		 
		 	        }
		 
		 	      });
		
		 	       
		
		 	      zoom = (Button) findViewById(R.id.zoom);
		 
		 	      zoom.setOnClickListener(new OnClickListener() {
					
					@Override
					public void onClick(View v) {
						// TODO Auto-generated method stub
						zoomAnimation(v);
					}
				}); 
		
		 	         
		
		 	
		
		 	       
		 
		 	      moveIntent = (Button) findViewById(R.id.move);
		 
		 	      moveIntent.setOnClickListener(new OnClickListener() {
		 
		 	         
		
		 	        @Override
		
		 	        public void onClick(View v) {
		
		 	            // TODO Auto-generated method stub
		
		 	            moveAnimation(v);
		 
		 	        }
		 
		 	      });
		 
		 	       
		 
		 	      rotate = (Button) findViewById(R.id.rotate);
		
		 	      rotate.setOnClickListener(new OnClickListener() {
		 
		 	         
	
		 	        @Override
		
		 	        public void onClick(View v) {
		 
		 	            // TODO Auto-generated method stub
		
		 	            rotateAnimation(v);
		
		 	        }
		 
		 	      });
		
		 	   }
		
		 	 
		
		 	   private void fadeAnimation(View view) {
		 
		 	       Animation animation = AnimationUtils.loadAnimation(getApplicationContext(), R.anim.fade);
		 
		 	       mytext.startAnimation(animation);
		
		 	   }
		
		 	    
		
		 	   private void zoomAnimation(View view) {
		
		 	       Animation animation = AnimationUtils.loadAnimation(getApplicationContext(), R.anim.zoom);
		
		 	       myimage.startAnimation(animation);
		
		 	   }
		
		 	    
		
		 	   private void rotateAnimation(View view) {
		
		 	       Animation animation = AnimationUtils.loadAnimation(getApplicationContext(), R.anim.rotate);
		 
		 	       myimage.startAnimation(animation);
		
		 	   }
		
		 	    
		
		 	   private void moveAnimation(View view) {
		
		 	       try{
		 
		 	            Intent intent = new Intent(this, MoveActivity.class);
		 
		 	            startActivity(intent);
		
		 	       }catch(Exception e) {
		 
		 	           Toast.makeText(getApplicationContext(), "Error with the Intent",
		 
		 	                   Toast.LENGTH_SHORT).show();
		 
		 	           e.printStackTrace();
		 
		 	       }
	}

}
