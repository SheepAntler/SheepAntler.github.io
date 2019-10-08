// package it up!
package java111.project5;

/** The PizzaDriver class contains the Main Method for the SelectPizza and
 *  PizzaChoice classes. It will instantiate a new instance of the SelectPizza
 *  class and run its ProcessSelection() method.
 *
 *  To get this class to compile, I added the package statement
 *  "package java111.project5;" to the top of each class in the application. I
 *  used the javac -classpath classes -d classes src/java111/project5/*.java
 *  (comp5) command to compile these files and I used the
 *  java -classpath classes java111.project5.PizzaDriver (run5 PizzaDriver)
 *  command to run this file.
 *
 *  @author Elspeth Statler-Clouse
 */
public class PizzaDriver {
    /** This is the main method for the Pizza application
     *  @param args command line arguments--not used here
     *  @throws java.lang.ArrayIndexOutOfBoundsException if pizza size selection is not in the given range
     *  @throws java.lang.NumberFormatException if pizza size selection is accidentally entered as a letter
     *  @throws java.lang.Exception exception if user does not enter 1, 2, 3, or 4
     */

    public static void main(String[] args)
            throws Exception {

        SelectPizza  thisPizza  = new SelectPizza();
        thisPizza.processSelection();
    }
}
