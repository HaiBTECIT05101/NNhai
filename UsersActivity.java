package com.example.vdtea.activity;

import static android.content.ContentValues.TAG;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.app.Dialog;
import android.app.ProgressDialog;
import android.content.Intent;
import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.bumptech.glide.Glide;
import com.example.vdtea.R;
import com.example.vdtea.databinding.ActivityUsersBinding;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.android.material.appbar.MaterialToolbar;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;

public class UsersActivity extends AppCompatActivity {
    ActivityUsersBinding binding;
    FirebaseAuth mAuth;
    TextView tv_email;

    ImageView avatar;
    ProgressDialog dialog;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        avatar = findViewById(R.id.imageView);
        // Initialize the binding object using Data Binding
        binding = ActivityUsersBinding.inflate(getLayoutInflater());
        setContentView(binding.getRoot());

        tv_email = findViewById(R.id.tv_email);
        mAuth = FirebaseAuth.getInstance();
        // Now you can access the btnChangePassword button from the binding object
        binding.btnChangePassword.setOnClickListener(v -> {
            changePasswordDialog();
        });
        MaterialToolbar toolbar = findViewById(R.id.toolbar);
        toolbar.setTitle("Personal page");
        toolbar.setNavigationIcon(R.drawable.back);
        toolbar.setNavigationOnClickListener(v -> {
            Intent intent = new Intent(UsersActivity.this, MainActivity.class);
            startActivity(intent);
        });
        bottom_navigation();
    }
    private void bottom_navigation() {
        LinearLayout homeBtn = findViewById(R.id.homeBtn);
        LinearLayout cartBtn = findViewById(R.id.cartBtn);
        LinearLayout orderBtn = findViewById(R.id.orderBtn);
        LinearLayout profileBtn = findViewById(R.id.profileBtn);

        homeBtn.setOnClickListener(v -> startActivity(new Intent(UsersActivity.this, MainActivity.class)));
        cartBtn.setOnClickListener(v -> startActivity(new Intent(UsersActivity.this, CartActivity.class)));
        orderBtn.setOnClickListener(v -> startActivity(new Intent(UsersActivity.this, BookingActivity.class)));
        profileBtn.setOnClickListener(v -> startActivity(new Intent(UsersActivity.this, UsersActivity.class)));
    }
    protected void onStart() {
        super.onStart();
        FirebaseUser currentUser = mAuth.getCurrentUser();
        if (currentUser != null) {
            tv_email.setText(currentUser.getDisplayName());
        }
    }

    public void logout(View view) {
        mAuth.signOut();
        FirebaseUser currentUser = mAuth.getCurrentUser();

        if (currentUser == null) {
            Intent intent = new Intent(UsersActivity.this, LoginActivity.class);
            startActivity(intent);
            finish();
        }
    }
    private void changePasswordDialog() {
        Dialog dialog = new Dialog(UsersActivity.this);
        dialog.setContentView(R.layout.layout_change_password);
        dialog.getWindow().setBackgroundDrawable(new ColorDrawable(Color.TRANSPARENT));


        EditText newPass = dialog.findViewById(R.id.newPassword);
        EditText rePass = dialog.findViewById(R.id.re_newPassword);

        Button updatePass = dialog.findViewById(R.id.btnChangePassword);
        updatePass.setOnClickListener(view -> {
            String newPassStr = newPass.getText().toString();
            String rePassStr = rePass.getText().toString();
                        if (newPassStr.isEmpty()) {
                            newPass.setError("Field can't be empty");
                        }
                        else if (newPassStr.length()<6) {
                            Toast.makeText(UsersActivity.this, "Password must be 6 characters!",Toast.LENGTH_SHORT).show();
                        }
                        else if (newPassStr.isEmpty()) {
                            rePass.setError("Field can't be empty");
                        }
                        else if (rePassStr.length()<6) {
                            Toast.makeText(UsersActivity.this, "Password must be 6 characters!",Toast.LENGTH_SHORT).show();
                        }
                        else if(newPassStr.compareTo(rePassStr)!=0) {
                            Toast.makeText(UsersActivity.this, "Password and confirm password should be same",Toast.LENGTH_SHORT).show();
                        }
                        else {
                            FirebaseUser user = FirebaseAuth.getInstance().getCurrentUser();

                            user.updatePassword(newPassStr)
                                    .addOnCompleteListener(new OnCompleteListener < Void > () {
                                        @Override
                                        public void onComplete(@NonNull Task < Void > task) {
                                            if(task.isSuccessful()) {
                                                mAuth.signOut();
                                                FirebaseUser currentUser = mAuth.getCurrentUser();

                                                if(currentUser == null) {
                                                    Intent intent = new Intent(UsersActivity.this, LoginActivity.class);
                                                    startActivity(intent);
                                                    finish();
                                                    Toast.makeText(UsersActivity.this, "Change Successful, re-login required", Toast.LENGTH_SHORT).show();
                                                }
                                            } else {
                                                Log.e(TAG, "Error updating password: " + task.getException().getMessage());
                                            }
                                        }
                                    });
                        }
        });
        dialog.show();


    }
}