package webserver;

import java.io.FileWriter;
import java.io.IOException;
import java.io.OutputStream;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.ResultSetMetaData;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import org.json.*;
import org.json.JSONArray;
import org.json.JSONObject;

public class Setup {

    //room number for THAT device
    String roomnum = "";

    //Time period for timetble
    int table_Tstart = 0;
    int table_Tend = 0;

    private final OutputStream os;

    public Setup(final OutputStream os) {
        this.os = os;
    }

    public static Connection connect() throws ClassNotFoundException, IOException {
        
        
        return null;

    }
    

}
