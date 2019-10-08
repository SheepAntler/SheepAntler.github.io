/** Creates a coffee maker object and tests it
 *  by calling its brewStrong and brewWeak methods.
 *
 * @author Elspeth Stalter-Clouse
 */

public class CoffeeMakerTestDrive {

    /** Instantiate a coffee maker object
     *  and call its brewStrong and brewWeak methods.
     *
     * @param args command line arguments
     */
    public static void main(String[] args) {

        // Create a coffee maker object
        CoffeeMaker coffeeMaker1 = new CoffeeMaker();

        // Call the brewStrong and brewWeak methods
        coffeeMaker1.brewStrong();
        coffeeMaker1.brewWeak();
    }
}
