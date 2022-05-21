
const initState = {
    loading: false,
    categories: [],
    products: [],
    customers: []
}
const DefaultReducer = (state = initState, action) => {
    if (action.type === "SET_LOADER") {
        return { ...state, loading: true }
    }
    else if (action.type === "CLOSE_LOADER") {
        return { ...state, loading: false }
    }
    else {
        return state;
    }
    return state;
}

export default DefaultReducer;