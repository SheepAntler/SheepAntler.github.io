// package it up!
package java111.project5.labs;

/** The Waterfowl class holds constructors pertaining to Waterfowl objects
 *
 *  @author Elspeth Stalter-Clouse
 */
public class Waterfowl {
    // instance variables pertaining to a Waterfowl object
    String name;
    int size;

    /** The default constructor has no parameters sets a default name
     *  and size for a Waterfowl object.
     */
    public Waterfowl() {
        name = "Mallard duck";
        size = 39;
    }

    /** The size constructor will set a new size for a Waterfowl object.
     *  It contains one parameter for the int size.
     *
     *  @param size sets the size of a Waterfowl object
     */
    public Waterfowl(int size) {
        // call the default constructor
        this();
        // set the size
        this.size = size;
    }

    /** The name constructor will set a new name for a Waterfowl object.
     *  It contains one parameter for the String name.
     *
     *  @param name sets the name of a Waterfowl object
     */
    public Waterfowl(String name) {
        // call the default constructor
        this();
        // set the name
        this.name = name;
    }

    // for my own edification, I'm setting both size and name with a single
    // constructor as well HERE:

    /** The name/size constructor will set both the name and size
     *  of a Waterfowl object
     *  It contains two parameters for the int size and String name
     *
     *  @param name sets the name of a Waterfowl object
     *  @param size sets the size of a Waterfowl object
     */
    public Waterfowl(String name, int size) {
        // call the default constructor
        this(name);
        this.size = size;
        // there's duplicate code in here, which isn't great :(
    }

    /** The toString method is a String representation of a Waterfowl object.
     *  @return String description of a Waterfowl object
     */
    public String toString() {
        return "Oink! Just kidding. I'm not a pig; I'm an adult " + name + ". "
                + "My wingspan is about " + size + " in.";
    }
}
