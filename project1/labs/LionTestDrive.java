/** Creates two lion objects and test them by calling their roar methods.
 *
 * @author Elspeth Stalter-Clouse
 */

public class LionTestDrive {

    /** Instantiate two lion objects
     *  and call their roar methods.
     *
     * @param args command line arguments
     */
    public static void main(String[] args) {

        // Instantiate two lion objects
        Lion lion1 = new Lion();
        Lion lion2 = new Lion();

        // Set some details on both lions
        lion1.lionNumber = "first";
        lion2.lionNumber = "second";

        // Call the roar method on both Lions
        lion1.roar();
        lion2.roar();
    }
}
