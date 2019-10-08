/**
 * A lab to practice building a loop
 *
 * @author Elspeth Stalter-Clouse
 */
public class LabTwoLooping {
    /**
     * This is the main method for this class
     * which will loop 13 times outputting the counter and its square
     *
     * @param args
     */
    public static void main(String[] args) {
        int counter = 0;

        while (counter < 13) {
            System.out.println(counter + " " + (counter * counter));
            counter = counter + 1;
        }
    }
}
