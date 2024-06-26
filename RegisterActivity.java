package com.example.vdtea.activity;

import static android.content.ContentValues.TAG;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.AppCompatButton;

import android.annotation.SuppressLint;
import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.text.method.HideReturnsTransformationMethod;
import android.text.method.PasswordTransformationMethod;
import android.util.Log;
import android.view.MotionEvent;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import com.example.vdtea.R;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;

public class RegisterActivity extends AppCompatActivity {

    EditText email, password, confirmPass;
    boolean passwordVisible, confirmPassVisible;
    private FirebaseAuth mAuth;
    AppCompatButton LoginButton, RegisterButton;
    @SuppressLint("ClickableViewAccessibility")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);
        mAuth = FirebaseAuth.getInstance();
        email = findViewById(R.id.register_editEmail);
        password = findViewById(R.id.register_editPass);
        confirmPass = findViewById(R.id.register_editConfirmPass);
        LoginButton = findViewById(R.id.btn_Login);
        RegisterButton = findViewById(R.id.btn_Register);

        LoginButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(RegisterActivity.this, LoginActivity.class);
                startActivity(intent);
                finish();
            }
        });
        RegisterButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String txt_email, txt_password,txt_confirmPass;
                txt_email = String.valueOf(email.getText());
                txt_password = String.valueOf(password.getText());
                txt_confirmPass = String.valueOf(confirmPass.getText());
                if(TextUtils.isEmpty(txt_email)){
                    Toast.makeText(RegisterActivity.this, "Please enter email", Toast.LENGTH_SHORT).show();
                    return;
                }
                if(TextUtils.isEmpty(txt_password)){
                    Toast.makeText(RegisterActivity.this, "Please enter password", Toast.LENGTH_SHORT).show();
                    return;
                }
                if(!txt_password.equals(txt_confirmPass)){
                    Toast.makeText(RegisterActivity.this, "New password does not match", Toast.LENGTH_SHORT).show();
                    return;
                }
                mAuth.createUserWithEmailAndPassword(txt_email, txt_password)
                        .addOnCompleteListener( new OnCompleteListener<AuthResult>() {
                            @Override
                            public void onComplete(@NonNull Task<AuthResult> task) {
                                if (task.isSuccessful()) {
                                    Toast.makeText(RegisterActivity.this, "Sign Up Success",
                                            Toast.LENGTH_SHORT).show();
                                    Intent intent = new Intent(getApplicationContext(), LoginActivity.class);
                                    startActivity(intent);

                                } else {
                                    Log.w(TAG, "createUserWithEmail:failure", task.getException());
                                    Toast.makeText(RegisterActivity.this, "Registration failed",
                                            Toast.LENGTH_SHORT).show();
                                }
                            }
                        });
            }
        });

        password.setOnTouchListener(new View.OnTouchListener() {
            @Override
            public boolean onTouch(View v, MotionEvent event) {
                final int right = 2;
                if (event.getAction() == MotionEvent.ACTION_UP){
                    if (event.getRawX() >= password.getRight()-password.getCompoundDrawables()[right].getBounds().width()){
                        int selection = password.getSelectionEnd();
                        if (passwordVisible){
                            password.setCompoundDrawablesRelativeWithIntrinsicBounds(0,0,R.drawable.hide_password,0);
                            password.setTransformationMethod(PasswordTransformationMethod.getInstance());
                            passwordVisible = false;
                        }
                        else{
                            password.setCompoundDrawablesRelativeWithIntrinsicBounds(0,0,R.drawable.show_password,0);
                            password.setTransformationMethod(HideReturnsTransformationMethod.getInstance());
                            passwordVisible = true;
                        }
                        password.setSelection(selection);
                        return true;
                    }
                }
                return false;
            }
        });

        confirmPass.setOnTouchListener(new View.OnTouchListener() {
            @Override
            public boolean onTouch(View v, MotionEvent event) {
                final int right = 2;
                if (event.getAction() == MotionEvent.ACTION_UP){
                    if (event.getRawX() >= confirmPass.getRight()-confirmPass.getCompoundDrawables()[right].getBounds().width()){
                        int selection = confirmPass.getSelectionEnd();
                        if (confirmPassVisible){
                            confirmPass.setCompoundDrawablesRelativeWithIntrinsicBounds(0,0,R.drawable.hide_password,0);
                            confirmPass.setTransformationMethod(PasswordTransformationMethod.getInstance());
                            confirmPassVisible = false;
                        }
                        else{
                            confirmPass.setCompoundDrawablesRelativeWithIntrinsicBounds(0,0,R.drawable.show_password,0);
                            confirmPass.setTransformationMethod(HideReturnsTransformationMethod.getInstance());
                            confirmPassVisible = true;
                        }
                        confirmPass.setSelection(selection);
                        return true;
                    }
                }
                return false;
            }
        });
    }
}