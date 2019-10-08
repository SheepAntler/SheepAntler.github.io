// package it up!
package java111.project5.labs;

/** The WaterfowlTestDrive class contains a main method that will create
 *  several instances of Waterfowl objects and set their constructors, then
 *  output their respective toString methods.
 *
 *  @author Elspeth Stalter-Clouse
 */
public class WaterfowlTestDrive {
    /** Here is the main method!
     *  @param args the command line arguments 
     */
    public static void main(String[] args) {
        // create a default Waterfowl object
        Waterfowl defaultWaterfowl = new Waterfowl();
        Waterfowl tinyDuck = new Waterfowl(32);
        Waterfowl eurasianBittern = new Waterfowl("Eurasian bittern");
        Waterfowl greatCrestedGrebe = new Waterfowl("Great crested grebe", 19);

        // call their toString() methods
        System.out.println(defaultWaterfowl.toString());
        System.out.println(tinyDuck.toString());
        System.out.println(eurasianBittern.toString());
        System.out.println(greatCrestedGrebe.toString());
    }
}
