/** Test the NameLoop class by calling its loopName method
 *  on a fullName object.
 *
 * @author Elspeth Stalter-Clouse
 */

public class NameLoopTestDrive {

    /** Instantiate a fullName object
     *  and call the loopName method on it.
     *
     * @param args command line arguments
     */
    public static void main(String[] args) {

        // Instantiate a fullName object
        NameLoop name = new NameLoop();

        // Set the object to your full name
        name.fullName = "Elspeth Stalter-Clouse";

        // Call the loopName method on the fullName object
        name.loopName();
    }
}
