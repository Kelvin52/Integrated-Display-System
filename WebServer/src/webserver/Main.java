/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package webserver;

import java.io.IOException;
import static webserver.SQLConnect.connect;

/**
 *
 * @author xmt6676
 */
class Main extends Exception {
    
   public static void main(String args[]) throws ClassNotFoundException, IOException {
       connect();
   }
    
}
