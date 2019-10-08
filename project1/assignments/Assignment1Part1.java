/**
 * This assignment will contain a loop that will output a counter
 * variable 7 times and increment the variable by 1
 *
 * @author Elspeth Stalter-Clouse
 */
public class Assignment1Part1 {
    /**
     * This is the main method for this class
     * which will loop 7 times, outputting the counter each time.
     *
     * @param args command line arguments
     */
    public static void main(String[] args) {
        int counter = 0;

        while (counter < 7) {
            System.out.println(counter);
            counter = counter + 1;
        }
    }
}
