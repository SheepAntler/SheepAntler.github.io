/**
 * This assignment will contain a loop that loops 20 times
 * and outputs different messages depending on the loop counter's value
 *
 * @author Elspeth Stalter-Clouse
 */
public class Assignment1Part2 {
    /** This is the main method for this class
     * which will loop 20 times, output 3 different messages,
     * and increment the counter variable.
     *
     * @param args command line arguments
     */
    public static void main(String[] args) {
        int counter = 0;

        while (counter < 20) {

            if (counter == 0) {
                System.out.println(counter + ": First Time!");
            } else if (counter == 9) {
                System.out.println(counter + ": Half-way there...");
            } else if (counter == 19) {
                System.out.println(counter + ": All done!");
            }

            counter = counter + 1;
        }
    }
}
