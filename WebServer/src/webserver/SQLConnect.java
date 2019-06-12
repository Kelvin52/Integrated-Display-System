package webserver;

import java.io.FileWriter;
import java.io.IOException;
import java.io.OutputStream;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;
import org.json.*;
import org.json.JSONArray;
import org.json.JSONObject;

public class SQLConnect {
    
    //room number for THAT device
    String roomnum = "";
    
    //Time period for timetble
    int table_Tstart = 0;
    int table_Tend = 0;
    
    
    private final OutputStream os;
        
        public SQLConnect(final OutputStream os) {
            this.os = os;
        }
 
    
    public static Connection connect() throws ClassNotFoundException, IOException{
        
        
        
        // Create a variable for the connection string.
        String connectionUrl = "jdbc:sqlserver://BammBamm:1433;databaseName=TestDB;user=timetable;password=a%89UIes";

        Connection con = null;
        
        String roomnum = "WZ416%";
                
        try{
            con = DriverManager.getConnection(connectionUrl); 
            Statement stmt = con.createStatement();
            
            String SQL = "SELECT[ActivityHostKey]\n" +
                        "      ,[ParentHostKey]\n" +
                        "      ,[ActivityName]\n" +
                        "      ,[PaperDescription]\n" +
                        "      ,[ActivityType]\n" +
                        "      ,[StartDateTime]\n" +
                        "      ,[EndDateTime]\n" +
                        "      ,[DT_ActivityId]\n" +
                        "      ,[Day]\n" +
                        "      ,[Week]\n" +
                        "      ,[Occurrence]\n" +
                        "      ,[Room]\n" +
                        "      ,[HostKey]\n" +
                        "      ,[PaperName]\n" +
                        "  FROM [TestDB].[dbo].[AUT_O365_stgActivity]"+
                        "WHERE Room LIKE '"+ roomnum +"'" +
                        "ORDER BY StartDateTime ASC";
            
            ResultSet rs = stmt.executeQuery(SQL);
            
            // Iterate through the data in the result set and display it.
            
            JSONArray jArray = new JSONArray();
            int arraycount = 0;
            
            while (rs.next()){
                String startTime_json = rs.getString("StartDateTime");
                String endTime_json = rs.getString("EndDateTime");
                String Day_json = rs.getString("Day");
                String paperDes_json = rs.getString("PaperDescription");
                String room_json = rs.getString("Room");
                
                JSONObject jobj = new JSONObject();
                
                jobj.put("Room", room_json);
                jobj.put("StartDateTime", startTime_json);
                jobj.put("EndDateTime", endTime_json);
                jobj.put("Day", Day_json);
                jobj.put("PaperDescription", paperDes_json);
                
                jArray.put(jobj);
                arraycount += 1;
            }
            
            System.out.println(arraycount);
            
            JSONObject tt = new JSONObject();
            
            tt.put("TimeTable", jArray);
            
            
        
            
            try(FileWriter file = new FileWriter("WZ416.json")){
                file.write(tt.toString(4));
                file.flush();
            }catch(IOException e){
                //e.printStackTrace();
            }
           // System.out.println(tt.toString(4));
            
//            while (rs.next()) {
//                System.out.println(rs.getString("StartDateTime") + " " + rs.getString("EndDateTime") + " "
//                + rs.getString("ActivityName") + " " + rs.getString("Room"));
//            }   

        }
        // Handle any errors that may have occurred.
        catch (SQLException e) {
            e.printStackTrace();
        }
        
        return con;
    }
    
    
   
    
    
    
}