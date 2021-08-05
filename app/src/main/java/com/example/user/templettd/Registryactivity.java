package com.example.user.templettd;

import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ListView;
import android.widget.Toast;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONObject;

public class Registryactivity extends Fragment {
    View view;
    ListView registry_lst;

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        view = inflater.inflate(R.layout.registry, container,false);
        registry_lst = (ListView) view.findViewById(R.id.lst_registry);

        RequestQueue queue = Volley.newRequestQueue(getActivity().getApplicationContext());
        JsonArrayRequest req = new JsonArrayRequest("http://"+ConFigurationUtil.IpConfig+"/Temple/ED_select.php?uid="+signin_fetch.user_id, new Response.Listener<JSONArray>() {
            @Override
            public void onResponse(JSONArray response) {
                int count = response.length();
                Registrydisplay.arrdatareg.clear();
                for (int i = 0; i < count; i++) {
                    try {
                        JSONObject obj = response.getJSONObject(i);
                        Registrydisplay reg = new Registrydisplay();
                       // reg.setEid(obj.getString("Event_id"));
                        reg.setTitle("Title:" + obj.getString("title"));
                       reg.setSdate("StartDate: " + obj.getString("sdate"));
                        reg.setEdate("EndDate: " + obj.getString("edate"));

                        Registrydisplay.arrdatareg.add(reg);
                    } catch (Exception e) {
                        Toast.makeText(getActivity().getApplicationContext(), e.getMessage(), Toast.LENGTH_LONG).show();
                    }

                }
                Registryadapter reg1 = new  Registryadapter(getActivity().getApplicationContext());
                registry_lst.setAdapter(reg1);
            }

        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {

            }
        });
        queue.add(req);
        return view;
    }
}
