/** This class is designed to test the processUserGuess() method from the
 *  GuessMyNumber application.
 *  During this test TWO random numbers will be generated; one from this class
 *  to test whether the number is in the 1-100 range, and another from the
 *  GuessMyNumber class to test the validity of the three messages to be
 *  returned to the user.
 *
 * @author Elspeth Stalter-Clouse
 */
public class GuessMyNumberTestDrive {
    /** the main method for this class will run a for loop that will compare
     *  a number to a randomly-generated number and tell me whether
     *  my program is correctly deciphering the difference between the two
     *  @param args
     */
    public static void main(String[] args) {

        // Create the object I want to test
        GuessMyNumber newGame = new GuessMyNumber();

        // First test: Is the random number in the 1-100 range?

        // Generate a number
        newGame.generateNumber();
        int randomNumber = newGame.getTargetNumber();

        // First, test that the generated number is indeed between 1 and 100
        if (randomNumber >= 1 && randomNumber <= 100) {
            System.out.println("Test 1: SUCCESS! Number: " + randomNumber);
        } else {
            System.out.println("Test1 1: FAILURE! Number: " + randomNumber);
        }

        // Second test: make sure the user's guess is correctly compared
        // to the target if it is:
        //      1) too big
        //      2) too small
        //      3) just right!

        // Create a user guess
        int practiceGuess = 50;

        // set the targetNumber to something small
        newGame.setTargetNumber(12);

        if (practiceGuess > newGame.getTargetNumber()) {
            System.out.println("Test 2a (practice > target): SUCCESS!");
        } else {
            System.out.println("Test 2a (practice > target): Try again.");
        }

        // set the targetNumber to something big
        newGame.setTargetNumber(99);

        if (practiceGuess < newGame.getTargetNumber()) {
            System.out.println("Test 2b (practice < target): SUCCESS!");
        } else {
            System.out.println("Test 2b (practice < target): Try again.");
        }

        // set the targetNumber to the practiceGuess number
        newGame.setTargetNumber(50);

        if (practiceGuess == newGame.getTargetNumber()) {
            System.out.println("Test 2c (practice = target): SUCCESS!");
        } else {
            System.out.println("Test 2c (practice = target): Try again.");
        }
    }
}
