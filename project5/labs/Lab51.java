package java111.project5.labs;

import java.util.*;
import java.text.SimpleDateFormat;

/**
 *  Lab 5-1
 *
 *@author    eknapp
 */
public class Lab51 {

    /**
     *  Main processing method for the Lab51 object
     */
    public void run() {

        Date date = new Date();

        SimpleDateFormat formatter = new SimpleDateFormat("E, dd MMM yyyy HH:mm:ss z");

        String formattedDate = formatter.format(date);

        System.out.println("[java111.project5.labs.Lab51 > run( )]"
                 + formattedDate);
    }
}
