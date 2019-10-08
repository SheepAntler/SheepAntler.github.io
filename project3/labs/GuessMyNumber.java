/** This class will generate a random number, compare it to the practice guess
 *  in the GuessMyNumberTestDrive class, and ouput a message as a result.
 *  The structure of this application is so simple that I will basically build
 *  out the whole thing minus the InputHelper part to test it.
 *
 * @author Elspeth Stalter-Clouse
 */

public class GuessMyNumber {
    // Declare variables
    private int targetNumber;

    /** This is the generateNumber method which will generate a random
     *  number between 1 and 100
     */
    public void generateNumber() {
        // calculate the random number
        targetNumber = (int)(Math.random() * 100 + 1);
    }

    // set-and-get!
    /** set the target number
     *  @param newTargetNumber
     */
    public void setTargetNumber(int newTargetNumber) {
        targetNumber = newTargetNumber;
    }

    /** get the target number
     *  @return target number
     */
    public int getTargetNumber() {
        return targetNumber;
    }

    /** In the future, the proccesUserGuess method will live here,
     *  but right now I'm testing that feature in the TestDrive
     */ 
}
