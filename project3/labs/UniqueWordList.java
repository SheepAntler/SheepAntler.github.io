// import the java.util package
import java.util.*;

/** This class will contain a variable to hold user entries (with its get/set
 *  methods), an instance of the InputHelper class to collect user entries, and
 *  loops/if statements to add the user's entries to an ArrayList.
 *
 *  @author Elspeth Stalter-Clouse
 */
public class UniqueWordList {
    // instantiate a new InputHelper object
    InputHelper input = new InputHelper();

    // declarations
    private String userEntry;
    private ArrayList<String> enteredWordList;

    // set-and-get
    /** set userEntry
     *  @param userEntry
     */
    public void setUserEntry(String userEntry) {
        this.userEntry = userEntry;
    }

    /** get userEntry
     *  @return userEntry
     */
    public String getUserEntry() {
        return userEntry;
    }

    /** This method will ask the user to enter a word, and if that word is not
     *  "quit" the word will be added to the ArrayList.
     */
    public void run() {
        // instantiate an ArrayList that will hold the user's words
        enteredWordList = new ArrayList<String>();

        // output some information about the program
        System.out.println();
        System.out.println("Welcome to List Those Words!"
                + System.lineSeparator() + "Enter a word, or type \"quit\" to "
                + "exit the program and see your unique words.");
        System.out.println("P.S. Bonus: See if you can guess all five keywords!");
        System.out.println("(Hint: think of things you'd find in a vegetable "
                + "garden...)");
        System.out.println();

        // build a loop to set user words into the ArrayList
        while (true) {
            // prompt the user to enter a word
            userEntry = input.getUserInput("Type a word, any word:");

            // check to see if the word was "quit"
            if (getUserEntry().equals("quit")) {
                // call end method
                end();
                break;
            } else {
                enteredWordList.add(getUserEntry());
            }
        }
    }

    /** This method will output the unique words from the enteredWordList
     *  ArrayList
     */
    public void end() {
        // create and instantiate a set to find the unique words in the
        // ArrayList
        Set<String> uniqueWordList = new HashSet<String>(enteredWordList);

        // Extra Challente 2: Alphabetize results
        TreeSet<String> alphabetizedWordList = new TreeSet<String>(uniqueWordList);

        // output the results to the terminal window
        System.out.println();
        System.out.println("******** Your List of UNIQUE Words ********");
        System.out.println("***** An '*' denotes a keyword match! *****");
        System.out.println();
        for (String userEntry : alphabetizedWordList) {
            // Extra Challenge 1: keyword list!
            if (userEntry.equals("carrot")
                || userEntry.equals("carrots")
                || userEntry.equals("eggplant")
                || userEntry.equals("eggplants")
                || userEntry.equals("kohlrabi")
                || userEntry.equals("kohlrabis")
                || userEntry.equals("tomato")
                || userEntry.equals("tomatoes")
                || userEntry.equals("radish")
                || userEntry.equals("radishes")) {
            System.out.println(userEntry + " *");
            } else {
                System.out.println(userEntry);
            }
        }
        System.out.println();
        System.out.println("*******************************************");
    }
}
