import { GetterTree } from "vuex";
import { RootState } from "@/store/state";
import { AuthState } from "./state";

export type Getters = {
  token(state: AuthState): string;
  isAuthenticated(state: AuthState): boolean;
  didAutoLogout(state: AuthState): boolean;
};

export const getters: GetterTree<AuthState, RootState> & Getters = {
  token: (state) => {
    return state.token;
  },
  isAuthenticated: (state) => {
    return !!state.token;
  },
  didAutoLogout: (state) => {
    return state.didAutoLogout;
  },
};
