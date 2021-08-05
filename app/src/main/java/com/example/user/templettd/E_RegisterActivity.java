package com.example.user.templettd;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.GridView;
import android.widget.ImageButton;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONObject;

import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.util.Calendar;
import java.util.Date;
import java.util.GregorianCalendar;

public class E_RegisterActivity extends AppCompatActivity {
    TextView t1;
    Button btn_reg;
    public GregorianCalendar cal_month, cal_month_copy;
    private AttendanceParentAdapter cal_adapter;
    private TextView tv_month;
    //private TextView tv_month;
    String calm,caly;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_e__register);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        t1=(TextView)findViewById(R.id.er_txt);
        Intent temp = getIntent();
        cal_month = (GregorianCalendar) GregorianCalendar.getInstance();
        cal_month_copy = (GregorianCalendar) cal_month.clone();
        tv_month = (TextView) findViewById(R.id.tv_month);
        tv_month.setText(android.text.format.DateFormat.format("MMMM yyyy", cal_month));
        final String eid = temp.getStringExtra("eid");
        ImageButton previous = (ImageButton) findViewById(R.id.ib_prev);
        previous.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                setPreviousMonth();
                refreshCalendar();
            }
        });

        ImageButton next = (ImageButton) findViewById(R.id.Ib_next);
        next.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                setNextMonth();
                refreshCalendar();

            }
        });
        cal_adapter = new AttendanceParentAdapter(getApplicationContext(), cal_month);
        GridView gridview = (GridView) findViewById(R.id.gv_calendar);
        gridview.setAdapter(cal_adapter);
        btn_reg=(Button)findViewById(R.id.btn_er);
        btn_reg.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                //RequestQueue queue= Volley.newRequestQueue(getApplicationContext());
                //String data=""+signin_fetch.user_id+"/"+eid;
               // Toast.makeText(getApplicationContext(),"data",Toast.LENGTH_LONG).show();

                SimpleDateFormat dateFormat = new SimpleDateFormat("dd/MM/yyyy");
                Date cal = new Date();
                String dttemp= dateFormat.format(cal);
                Toast.makeText(getApplicationContext(),dttemp,Toast.LENGTH_LONG).show();

               // DateFormat dateFormat = new SimpleDateFormat("dd/MM/yyyy");
               // Date date = new Date();
               // System.out.println(dateFormat.format(date));
              //  String dt = date.toString();
                //Toast.makeText(getApplicationContext(),dateFormat.format(date)+"data",Toast.LENGTH_LONG).show();
                 String url = "http://"+ConFigurationUtil.IpConfig+"/Temple/ER_insert.php?Event_type_id="+eid+"&Event_date="+dttemp+"&Reg_id="+signin_fetch.user_id+"&Status=Active";
                RequestQueue queue= Volley.newRequestQueue(getApplicationContext());
                JsonArrayRequest req=new JsonArrayRequest( url,new Response.Listener<JSONArray>() {
                    @Override
                    public void onResponse(JSONArray response) {
                        if(response.length()>0){
                            try{
                                JSONObject obj=response.getJSONObject(0);
                                String msg=obj.getString("msg");
                                if(msg.equalsIgnoreCase("Success")){
                                    Toast.makeText(getApplicationContext(),"Success",Toast.LENGTH_SHORT).show();
                                }
                                else{
                                    Toast.makeText(getApplicationContext(),"Something went wrong!!",Toast.LENGTH_SHORT).show();
                                }
                            }catch (Exception e){}
                        }
                    }
                }, new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(getApplicationContext(), error.getMessage(),Toast.LENGTH_SHORT).show();

                    }
                });
                queue.add(req);
            }
        });

    }

    @Override
    public boolean onSupportNavigateUp() {
        finish();
        return super.onSupportNavigateUp();
    }
    protected void setNextMonth() {
        if (cal_month.get(GregorianCalendar.MONTH) == cal_month.getActualMaximum(GregorianCalendar.MONTH)) {
            cal_month.set((cal_month.get(GregorianCalendar.YEAR) + 1),
                    cal_month.getActualMinimum(GregorianCalendar.MONTH), 1);
        } else {
            cal_month.set(GregorianCalendar.MONTH,
                    cal_month.get(GregorianCalendar.MONTH) + 1);
        }

    }


    protected void setPreviousMonth() {
        if (cal_month.get(GregorianCalendar.MONTH) == cal_month.getActualMinimum(GregorianCalendar.MONTH)) {
            cal_month.set((cal_month.get(GregorianCalendar.YEAR) - 1),
                    cal_month.getActualMaximum(GregorianCalendar.MONTH), 1);
        } else {
            cal_month.set(GregorianCalendar.MONTH,
                    cal_month.get(GregorianCalendar.MONTH) - 1);
        }

    }

    public void refreshCalendar() {
        calm=android.text.format.DateFormat.format("MM", cal_month).toString();
        caly=android.text.format.DateFormat.format("yyyy", cal_month).toString();
        cal_adapter.refreshDays();
        cal_adapter.notifyDataSetChanged();
        tv_month.setText(android.text.format.DateFormat.format("MMMM yyyy", cal_month));
    }




}
