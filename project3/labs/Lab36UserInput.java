/** Using the InputHelper class, this class will prompt a user for input strings
 *  and will run until the user enters the word, "quit".
 *
 *  @author Elspeth Stalter-Clouse
 */
public class Lab36UserInput {
    // create a new instance of the InputHelper object
    InputHelper input = new InputHelper();

    // This method will run the loop
    public void run() {
        // declare some variables
        String userEntry;
        int vocabularyCounter = 0;

        // Output a start message
        System.out.println();
        System.out.println("So, you think you're a wordsmith? Let's see!");
        System.out.println("Enter as many words as you can think of.");
        System.out.println("Once you're out of ideas, enter \"quit\" to "
                + "see how you did.");
        System.out.println();

        // build your loop
        while (true) {
            // prompt user for input
            userEntry = input.getUserInput("Enter a word that you know:");
            // check to see if the input was the word "quit" or not
            if (userEntry.equals("quit")) {
                System.out.println("Your vocabulary consists of "
                        + vocabularyCounter + " words.");
                System.out.println("Goodbye!");
                break;
            } else {
                System.out.println("Cool! You know the word " + userEntry + ".");
                System.out.println();
                vocabularyCounter ++;
            }
        }
    }
}
