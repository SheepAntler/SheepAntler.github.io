/**
 * Practicing if/else statements and booleans
 *
 * @author Elspeth Stalter-Clouse
 */
public class LabOneSelection {
    /**
     * Main method for this class which will compare
     * a variable to 100 and output a message
     * indicating whether or not the variable is bigger than 100.
     *
     * @param args command line arguments
     */
    public static void main(String[] args) {
        int targetNumber = 100;

        if (targetNumber > 100) {
            System.out.println("Hooray! The number is bigger than 100.");
        } else {
            System.out.println("Boo. That number is NOT bigger than 100.");
        }
    }
}
