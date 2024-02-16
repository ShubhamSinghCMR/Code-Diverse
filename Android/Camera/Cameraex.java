package com.example.cameraex;

import android.app.Activity;
import android.content.Intent;
import android.graphics.Bitmap;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.ImageButton;
import android.widget.ImageView;

public class MainActivity extends Activity {
	
	Button b1;
	ImageView iv;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		
		b1=(Button)findViewById(R.id.button1);
		iv=(ImageView)findViewById(R.id.imageView1);

        b1.setOnClickListener(new OnClickListener() {
			
			public void onClick(View v) {
				Intent i=new Intent(android.provider.MediaStore.ACTION_IMAGE_CAPTURE);
				startActivityForResult(i, 0);
				// TODO Auto-generated method stub
				
			}
		});
	}
	

	   protected void onActivityResult(int requestCode, int resultCode, Intent data) {
	      // TODO Auto-generated method stub
	      super.onActivityResult(requestCode, resultCode, data);
	      Bitmap bp=(Bitmap)data.getExtras().get("data");
	      iv.setImageBitmap(bp);
	   }
	   
	   @Override
	   protected void onDestroy() {
	      super.onDestroy();
	   }
	   
	

}
